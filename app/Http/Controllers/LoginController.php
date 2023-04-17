<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLoginRequest;
use Illuminate\Http\RedirectResponse;
use App\Models\User;

class LoginController extends Controller
{
    public function login(StoreLoginRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $login = $validated['login'];
        $password = $validated['password'];


        if (filter_var($login, FILTER_VALIDATE_EMAIL)) {
            $user = User::where('email', $login)->first();
        } else {
            $user = User::where('name', $login)->first();
        }

        if (!$user) {
            return back()->withInput($request->only('login', 'remember'))->withErrors(['login' => trans("user_not_found")]);
        }

        if (!$user->email_verified_at || !password_verify($password, $user->password)) {
            return back()->withInput($request->only('login', 'remember'))->withErrors(['password' => trans("user_password_incorrect")]);
        }

        auth()->login($user, $request->input('remember', false));

        if ($request->input('remember')) {
            $rememberToken = $user->email ?? $user->name;
            return redirect('/landing-worldwide')->withCookie('remember_token', $rememberToken)->withCookie('remember_token_password', $password);
        }

        session()->regenerate();

        return redirect('/landing-worldwide');
    }


    public function logout(): RedirectResponse
    {
        auth()->logout();
        return redirect("/login");
    }
}
