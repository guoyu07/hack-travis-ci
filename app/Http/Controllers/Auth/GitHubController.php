<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Socialite;
use App\User as UserModel;

class GitHubController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     * @author Seven Du <shiweidu@outlook.com>
     */
    public function redirect()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     * @author Seven Du <shiweidu@outlook.com>
     */
    public function callback()
    {
        $user = Socialite::driver('github')->user();

        $localUser = UserModel::firstOrNew(['id' => $user->id]);
        $localUser->id = $user->id;
        $localUser->login = $user->nickname;
        $localUser->name = $user->name;
        $localUser->email = $user->email;
        $localUser->avatar = $user->avatar;
        $localUser->token = $user->token;
        $localUser->save();
    }
}
