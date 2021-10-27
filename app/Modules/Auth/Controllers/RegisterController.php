<?php

namespace App\Modules\Auth\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Modules\Auth\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    public function register(RegisterRequest $request)
    {
        dd($request->all());
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);

        $token = $user->createToken('auth')->plainTextToken;
        return response()->json([
            'token' => $token,
            'user' => $user
        ]);
    }
}
