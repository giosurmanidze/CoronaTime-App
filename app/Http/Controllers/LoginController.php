<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(StoreLoginRequest $request)
    {
        $validated = $request->validated();

        $credentials = [
            'password' => $validated['password']
        ];

        if (filter_var($validated['login'], FILTER_VALIDATE_EMAIL)) {
            $credentials['email'] = $validated['login'];
        } else {
            $credentials['name'] = $validated['login'];
        }

        if (!auth()->attempt($credentials)) {
            return back()->withErrors(['login' => 'The provided credentials are incorrect.']);
        }

        session()->regenerate();

        return redirect('/landing-worldwide');
    }
}
