<?php

namespace App\Http\Controllers;

use App\Mail\User\AfterRegister;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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

        // $userLogin = User::firstOrCreate(["email" => $data['email']], $data);
        $userLogin = User::whereEmail($data['email'])->first();
        if (!$userLogin) {
            $userLogin = User::create($data);
            Mail::to($userLogin->email)->send(new AfterRegister($userLogin));
        }
        Auth::login($userLogin, true);

        return redirect(route('welcome'));
    }
}
