<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    public function showResetForm(Request $request, $token = null)
    {
        return view('auth.reset-password', ['request' => $request, 'token' => $token]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:3',
            'password_confirmation' => 'required',
        ]);
    
        $credentials = $request->only(
            'email', 'password', 'password_confirmation', 'token'
        );
    
        $response = Password::broker()->reset(
            $credentials,
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->save();
            }
        );
        
    
        if ($response == Password::PASSWORD_RESET) {
            return redirect('/login')->with('status', trans('passwords.reset'));
        } else {
            return back()->withErrors(['email' => [trans($response)]]);
        }
    }
    

}
