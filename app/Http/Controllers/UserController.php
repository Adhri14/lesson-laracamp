<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login() 
    {
        return view('auth.user.login');
    }

    public function google()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();
        $data = [
            "name" => $user->getName(),
            "email" => $user->getEmail(),
            "avatar" => $user->getAvatar(),
            "email_verified_at" => date('Y-m-d H:i:s', time()),
        ];

        $userLogin = User::firstOrCreate(["email" => $data['email']], $data);
        Auth::login($userLogin, true);

        return redirect(route('welcome'));
    }
}
