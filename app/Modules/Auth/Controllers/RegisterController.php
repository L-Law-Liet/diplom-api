<?php

namespace App\Modules\Auth\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Modules\Auth\Facades\AuthFacade;
use App\Modules\Auth\Requests\RegisterRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * @param RegisterRequest $request
     * @param AuthFacade $facade
     * @return JsonResponse
     */
    public function register(RegisterRequest $request, AuthFacade $facade): JsonResponse
    {
        return $facade->register($request->validated());
    }
}
