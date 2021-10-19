<?php

namespace App\Modules\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)){
            return response(
                [
                    'errors' => [
                        'email' => 'User not found'
                    ]
                ],
                422
            );
        }
        $token = $user->createToken('auth')->plainTextToken;

        return response()->json([
            'token' => $token
        ]);
    }
}
