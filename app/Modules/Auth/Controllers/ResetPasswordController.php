<?php

namespace App\Modules\Auth\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Modules\Auth\Requests\ForgotPasswordRequest;
use App\Modules\Auth\Requests\ResetPasswordMobileRequest;
use App\Modules\Auth\Requests\ResetPasswordRequest;
use App\Modules\Auth\Requests\ResetPasswordSuccessRequest;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class ResetPasswordController extends Controller
{
    public function forgotPassword(ForgotPasswordRequest $request)
    {
        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? \response(['status' => __($status)])
            : \response(['email' => __($status)]);
    }

    public function forgotPasswordMobile(ForgotPasswordRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        $data['code'] = $user->reset_code = rand(100000, 999999);
        $user->save();
        $data['name'] = $to_name = $user->name;
        $to_email = $user->email;
        Mail::send('mails.reset-code', $data, function ($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)->subject(config('app.name'));
            $message->from(config('mail.from.address'), config('mail.from.name'));
        });
        return response()->noContent(Response::HTTP_OK);
    }

    public function resetPasswordMobile(ResetPasswordMobileRequest $request)
    {
        $user = User::where('reset_code', $request->code)->first();
        $user->password = Hash::make($request->password);
        $user->reset_code = null;
        $user->save();
        return response()->noContent(Response::HTTP_OK);
    }

    public function resetPassword(ResetPasswordRequest $request)
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

    public function showResetPassword(ResetPasswordRequest $request)
    {
        return view('auth.reset-password', $request->validated());
    }

    public function showSuccess(ResetPasswordSuccessRequest $request)
    {
        return view('auth.success', [
            'status' => 'Your passord has been reset!',
        ]);
    }
}
