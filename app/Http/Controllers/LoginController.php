<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLoginRequest;
use App\Models\User;

class LoginController extends Controller
{
    public function login(StoreLoginRequest $request)
    {
        $validated = $request->validated();

        $login = $validated['login'];
        $password = $validated['password'];

        if (filter_var($login, FILTER_VALIDATE_EMAIL)) {
            $user = User::where('email', $login)->first();
        } else {
            $user = User::where('name', $login)->first();
        }

        if (!$user || !$user->email_verified_at || !password_verify($password, $user->password)) {
            return back()->withInput($request->only('login', 'remember'));
        }

        auth()->login($user, $request->input('remember', false));

        if ($request->input('remember')) {
            $rememberToken = $user->email ?? $user->name;
            return redirect('/landing-worldwide')->withCookie('remember_token', $rememberToken)->withCookie('remember_token_password', $password);
        }
        session()->regenerate();

        return redirect('/landing-worldwide');
    }


    public function destroy()
    {
        auth()->logout();
        return redirect("/login");
    }
}
