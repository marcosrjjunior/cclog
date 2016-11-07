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
        $repos    = [];

        if ($user->type == 0 && $user->token && $user->github_user) {
            $client = $this->gitAuth($user->token);
            // Change to Select a Organization Name Repositories

            $repos  = $client->api('user')->repositories($user->github_user);
            $repos  = collect($repos)->filter(function($repo) use ($projects) {
                return ! $repo['fork'] && ! $projects->contains('full_name', $repo['full_name']);
            });
        }

        return view('home', compact('repos', 'projects'));
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

    public function logs($ownerName, $repoName)
    {
        $user   = auth()->user();
        $client = $this->gitAuth($user->token);

        $logs = $client->api('issue')->all($ownerName, $repoName, ['labels' => 'cs', 'state' => 'close']);

        return view('repo.logs', compact('logs', 'ownerName', 'repoName'));
    }
}
