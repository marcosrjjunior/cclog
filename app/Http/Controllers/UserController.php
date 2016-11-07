<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Project;

class UserController extends Controller
{
    protected $client;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(Request $request)
    {
        $project = Project::whereName($request->input('repo_name'))
            ->whereOwner($request->input('owner_name'))
            ->first();

        if (! $project) return;

        $user = User::create([
            'name'     => $request->input('name'),
            'email'    => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'token'    => $request->input('token'),
            'type'     => $request->input('type'),
        ]);


        $project->users()->attach($user->id, [
            'type'  => $request->input('type'),
            'token' => $user->token,
        ]);

        return redirect()->back();
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $user->fill($request->input())->save();

        return redirect()->back();
    }
}