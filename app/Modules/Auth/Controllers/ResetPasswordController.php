<?php

namespace App\Modules\Auth\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Modules\Auth\Facades\ResetPasswordFacade;
use App\Modules\Auth\Requests\ForgotPasswordRequest;
use App\Modules\Auth\Requests\ResetPasswordMobileRequest;
use App\Modules\Auth\Requests\ResetPasswordRequest;
use App\Modules\Auth\Requests\ResetPasswordSuccessRequest;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class ResetPasswordController extends Controller
{
    private ResetPasswordFacade $facade;

    public function __construct(ResetPasswordFacade $facade)
    {
        $this->facade = $facade;
    }

    /**
     * @param ForgotPasswordRequest $request
     * @param ResetPasswordFacade $facade
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function forgotPassword(ForgotPasswordRequest $request)
    {
        return $this->facade->forgotPassword($request->validated());
    }


    /**
     * @param ForgotPasswordRequest $request
     * @return Response
     */
    public function forgotPasswordMobile(ForgotPasswordRequest $request): Response
    {
        return $this->facade->forgotPasswordMobile($request->validated());
    }

    /**
     * @param ResetPasswordMobileRequest $request
     * @return Response
     */
    public function resetPasswordMobile(ResetPasswordMobileRequest $request): Response
    {
        return $this->facade->resetPasswordMobile($request->validated());
    }

    /**
     * @param ResetPasswordRequest $request
     * @return RedirectResponse
     */
    public function resetPassword(ResetPasswordRequest $request): RedirectResponse
    {
        return $this->resetPassword($request);
    }

    public function showResetPassword(ResetPasswordRequest $request)
    {
        return view('auth.reset-password', $request->validated());
    }

    public function showSuccess()
    {
        return view('auth.success', [
            'status' => 'Your passord has been reset!',
        ]);
    }
}
