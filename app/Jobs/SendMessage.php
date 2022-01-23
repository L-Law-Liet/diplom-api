<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendMessage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private string $view;
    private string $to_email;
    private string $to_name;
    private array $data;

    /**
     * @param string $view
     * @param string $to_email
     * @param string $to_name
     * @param array $data
     */
    public function __construct(string $view, string $to_email, string $to_name, array $data)
    {
        $this->view = $view;
        $this->to_email = $to_email;
        $this->to_name = $to_name;
        $this->data = $data;
    }


    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email = $this->to_email;
        $name = $this->to_name;
        Mail::send($this->view, $this->data, function ($message) use ($email, $name) {
            $message->to($email, $name)->subject(config('app.name'));
            $message->from(config('mail.from.address'), config('mail.from.name'));
        });
    }
}
