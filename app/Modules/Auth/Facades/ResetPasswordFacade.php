<?php

namespace App\Modules\Auth\Facades;

use App\Facades\ModuleFacade;
use App\Jobs\ResetPassword;
use App\Jobs\SendMessage;
use App\Models\User;
use App\Modules\Auth\Requests\ResetPasswordRequest;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class ResetPasswordFacade extends ModuleFacade
{
    protected function model(): string
    {
        return User::class;
    }

    /**
     * @param array $data
     * @return \Illuminate\Http\Response
     */
    public function forgotPassword(array $data): Response
    {
        $status = Password::sendResetLink(
            [$data['email']]
        );

        return $status === Password::RESET_LINK_SENT
            ? response(['status' => __($status)])
            : response(['email' => __($status)]);
    }

    /**
     * @param array $validated
     * @return Response
     */
    public function forgotPasswordMobile(array $validated): Response
    {

        $user = User::where('email', $validated['email'])->first();
        $data['code'] = $user->reset_code = rand(100000, 999999);
        $user->save();
        $data['name'] = $user->name;
        $result = [
            'data' => $data,
            'email' => $user->email
        ];
        SendMessage::dispatch('mails.reset-code', $result['email'], $result['data']['name'], $result['data']);
        return response()->noContent(Response::HTTP_OK);
    }

    /**
     * @param array $validated
     * @return Response
     */
    public function resetPasswordMobile(array $validated): Response
    {
        $user = $this->model->where('reset_code', $validated['code'])->first();
        $user->password = Hash::make($validated['password']);
        $user->reset_code = null;
        $user->save();
        return response()->noContent(Response::HTTP_OK);
    }

    /**
     * @param ResetPasswordRequest $request
     * @return RedirectResponse
     */
    public function resetPassword(ResetPasswordRequest $request): RedirectResponse
    {
        $rememberToken = Str::random(60);
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) use ($request, $rememberToken) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken($rememberToken);

                $user->save();

                event(new PasswordReset($user));
            }
        );
        return $status == Password::PASSWORD_RESET
            ? redirect()->route('password.success',
                [
                    'token' => $rememberToken
                ]
            )
            : back()->withErrors(['email' => [__($status)]]);
    }
}
