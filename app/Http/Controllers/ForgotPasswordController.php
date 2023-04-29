<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmailRequest;
use App\Mail\CustomResetEmail;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    public function sendResetLinkEmail(EmailRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();

        $user = User::where('email', $validatedData["email"])->first();

        if (!$user) {
            return back()->withErrors(
                ['email' => trans('user_with_email')]
            );
        }

        $token = app('auth.password.broker')->createToken($user);
        $resetLink = url('/reset-password/' . $token . '?email=' . $validatedData["email"]);
        Mail::to($validatedData["email"])->send(new CustomResetEmail($resetLink));

        return redirect("/reset-link-status")->with('status', trans('reset_sent_message'));
    }
}
