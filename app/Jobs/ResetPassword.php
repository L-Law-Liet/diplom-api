<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ResetPassword implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private string $email;

    /**
     * @param string $email
     */
    public function __construct(string $email)
    {
        $this->email = $email;
    }


    /**
     * @return void
     */
    public function handle(): void
    {
        $user = User::where('email', $this->email)->first();
        $data['code'] = $user->reset_code = rand(100000, 999999);
        $user->save();
        $data['name'] = $user->name;
        $result = [
            'data' => $data,
            'email' => $user->email
        ];
        SendMessage::dispatch('mails.reset-code', $result['email'], $result['data']['name'], $result['data']);
    }
}
