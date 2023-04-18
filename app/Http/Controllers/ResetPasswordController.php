<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResetPasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    public function showResetForm(Request $request, $token = null)
    {
        return view('auth.reset-password', ['request' => $request, 'token' => $token]);
    }


    public function reset(ResetPasswordRequest $request) 
    {
        $credentials = [
            'token' => $request->input('token'),
            'password' => $request->input('password'),
            'password_confirmation' => $request->input('password_confirmation'),
        ];

        $response = Password::broker()->reset(
            $credentials,
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->save();
            }
        );

        if ($response === Password::PASSWORD_RESET) {
            return redirect('/login')->with('status', trans('passwords.reset'));
        } else {
            return back()->withErrors(['email' => [trans($response)]]);
        }
    }
}
