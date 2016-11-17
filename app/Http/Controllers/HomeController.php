<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;

class HomeController extends Controller
{
    protected $client;

    public function __construct()
    {
        $this->middleware('auth');
    }

    /*
    ** Authenticate User Git
    */
    public function gitAuth($gitToken)
    {
        $client = new \Github\Client();
        $client->authenticate($gitToken, null, \Github\Client::AUTH_HTTP_TOKEN);

        return $client;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user     = auth()->user();
        $projects = $user->projects;

        if ($user->type == 0 && $user->token && $user->nickname) {
            $repos = $this->getRepos($user, $projects);
        }

        return view('home', compact('repos', 'projects'));
    }

    public function getRepos($user, $userProjects)
    {
        $repos    = [];
        $myRepos  = [];

        $client   = $this->gitAuth($user->token);

        $orgs     = $client->api('user')->organizations($user->nickname);

        foreach ($orgs as $key => $org) {
            $repos = array_merge($repos, $client->api('repo')->org($org['login'], ['type' => 'all', 'per_page' => 999]));
        }

        $myRepos = $client->api('user')->repositories($user->nickname, 'owner');

        $myRepos = collect($myRepos)->filter(function($repo) use ($userProjects) {
            return ! $repo['fork'] && ! $userProjects->contains('full_name', $repo['full_name']);
        })->toArray();

        return array_merge($repos, $myRepos);
    }

    public function projectCreate(Request $request)
    {
        $project = Project::create([
            'owner' => $request->input('repo_owner'),
            'name'  => $request->input('repo_name'),
        ]);

        $user = auth()->user();
        $project->users()->attach($user->id, [
            'type'  => 0,
            'token' => $user->token,
        ]);

        return redirect()->back();
    }

    public function projectDelete(Request $request)
    {
        Project::whereName($request->input('repo_name'))
            ->whereOwner($request->input('owner_name'))
            ->delete();

        return redirect()->route('home');
    }

    public function logs($ownerName, $repoName)
    {
        $user   = auth()->user();
        $client = $this->gitAuth($user->token);

        $logs = $client->api('issue')->all($ownerName, $repoName, ['labels' => env('CCLOG_LABEL_NAME'), 'state' => 'close']);

        $reports = [];
        if ($user->type == 1) {
            $reports = $client->api('issue')->all($ownerName, $repoName, ['labels' => env('CCLOG_REPORT_LABEL_NAME'), 'state' => 'open']);
        }

        return view('repo.logs', compact('logs', 'reports', 'ownerName', 'repoName'));
    }

    public function reportCreate(Request $request)
    {
        $user   = auth()->user();
        $client = $this->gitAuth($user->token);

        $client->api('issue')->create($request->input('owner_name'), $request->input('repo_name'), [
            'title'  => $request->input('title'),
            'body'   => $request->input('body'),
            'labels' => [env('CCLOG_REPORT_LABEL_NAME')]
        ]);

        return redirect()->back();
    }
}
