<?php

namespace App\Modules\Auth\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Auth\Facades\AuthFacade;
use App\Modules\Auth\Requests\LoginRequest;
use Illuminate\Http\JsonResponse;

class LoginController extends Controller
{
    /**
     * @param LoginRequest $request
     * @param AuthFacade $facade
     * @return JsonResponse
     */
    public function login(LoginRequest $request, AuthFacade $facade): JsonResponse
    {
        return $facade->login($request->validated());
    }
}
