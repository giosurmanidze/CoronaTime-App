<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class PasswordResetController extends Controller
{
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);
    
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return back()->with('error', 'We could not find an account with that email address.');
        }
    
        $token = Str::random(60);
        DB::table('password_resets')->insert(['email' => $user->email, 'token' => $token, 'created_at' => now()]);
    
        $resetLink = url(route('password.reset', ['token' => $token, 'email' => $user->email], false));
        MAI::to($user->email)->send(new ResetPasswordEmail($resetLink));
    
        return back()->with('success', 'We have emailed your password reset link!');
    }
    
}
