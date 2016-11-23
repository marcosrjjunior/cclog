<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\User;
use Socialite;

class GithubController extends Controller
{
    protected $client;

    public function redirectToProvider()
    {
        return Socialite::driver('github')
            ->scopes(['repo'])
            ->redirect();
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

     /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('github')->user();
        } catch (Exception $e) {
            return redirect('auth/github');
        }

        $authUser = $this->findOrCreateUser($user);

        auth()->loginUsingId($authUser->id);

        return redirect('/home');
    }

    /**
     * Return user if exists; create and return if doesn't
     *
     * @param $githubUser
     * @return User
     */
    private function findOrCreateUser($githubUser)
    {
        if ($authUser = User::whereGithubId($githubUser->id)->first()) {
            return $this->updateToken($authUser, $githubUser);
        }

        return User::create([
            'name'      => $githubUser->name,
            'email'     => $githubUser->email,
            'nickname'  => $githubUser->nickname,
            'github_id' => $githubUser->id,
            'avatar'    => $githubUser->avatar,
            'token'     => $githubUser->refreshToken ?: $githubUser->token,
        ]);
    }

    public function updateToken($user, $githubData)
    {
        if ($user->token != $githubData->token) {
            $user->token = $githubData->token;
            $user->save();
        }

        return $user;
    }

}