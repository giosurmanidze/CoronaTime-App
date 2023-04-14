<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRegisterRequest;
use App\Models\User;
use App\Mail\ConfirmationEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function register(StoreRegisterRequest $request)
    {
        $validatedData = $request->validated();

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => $validatedData['password'],
            'confirmation_status' => false, 
        ]);

        $this->sendConfirmationEmail($user);

        return redirect('/confirmation-status');
    }


    public function confirmEmail(User $user)
    {
        if (!$user->confirmation_status) {
            $user->confirmation_status = true;
            $user->save();
        }

        return view('email.activated-account');
    }


    private function sendConfirmationEmail(User $user)
    {
        $confirmationLink = url('/confirm-account/' . $user->id);

        Mail::to($user->email)->send(new ConfirmationEmail($user, $confirmationLink));
    }
}
