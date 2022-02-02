<?php

namespace App\Modules\Auth\Facades;

use App\Facades\ModuleFacade;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class AuthFacade extends ModuleFacade
{

    protected function model(): string
    {
        return User::class;
    }

    /**
     * @param array $data
     * @return JsonResponse
     */
    public function login(array $data): JsonResponse
    {
        $user = User::where('email', $data['email'])->first();
        if (!Hash::check($data['password'], $user->password)) {
            return response()->json([
                'errors' => [
                    'email' => 'User not found'
                ]
            ]);
        }

        $token = $user->createToken('auth')->plainTextToken;

        return response()->json([
            'token' => $token,
            'user' => $user->load(['media'])
        ]);
    }

    /**
     * @param array $data
     * @return JsonResponse
     */
    public function register(array $data): JsonResponse
    {
        $data['password'] = Hash::make($data['password']);
        $user = $this->model->create($data);

        $token = $user->createToken('auth')->plainTextToken;
        return response()->json([
            'token' => $token,
            'user' => $user
        ]);
    }
}
