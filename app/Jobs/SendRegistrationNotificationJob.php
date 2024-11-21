<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Notifications\RegistrationNotification;
use InosoftUniversity\SharedModels\User;

class SendRegistrationNotificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function handle()
    {
        // Handle notification logic
        $user = User::find($this->data['user_id']);
        dump($user);
        if ($user) {
            $user->notify(new RegistrationNotification($this->data));
        }
    }
}
