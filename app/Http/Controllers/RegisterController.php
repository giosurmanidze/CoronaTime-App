<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRegisterRequest;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use App\Mail\ConfirmationEmail;
use Illuminate\View\View;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function register(StoreRegisterRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();
        unset($validatedData['password_confirmation']);

        $user = User::create($validatedData);

        $confirmationLink = url('/confirm-account/' . $user->id);
        Mail::to($user->email)->send(new ConfirmationEmail($user, $confirmationLink));

        return redirect('/confirmation-status');
    }


    public function confirmEmail(User $user): View
    {
        $user->email_verified_at = now();
        $user->save();

        return view('email.activated-account');
    }
}
