<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRegisterRequest;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function store(StoreRegisterRequest $request)
    {

        $validated_user = $request->validated();
    }
}
