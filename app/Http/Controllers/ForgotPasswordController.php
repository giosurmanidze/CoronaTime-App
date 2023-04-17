<?php

namespace App\Http\Controllers;

use App\Mail\CustomResetEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    public function broker()
    {
        return Password::broker();
    }


    protected function validateEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);
    }

    public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(
                ['email' => trans('user_with_email')]
            );
        }

        $token = app('auth.password.broker')->createToken($user);

        $resetLink = url('/reset-password/' . $token);

        Mail::to($request->email)->send(new CustomResetEmail($resetLink));

        return redirect("/reset-link-status")->with('status', trans('reset_sent_message'));
    }
}
