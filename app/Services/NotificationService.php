<?php

namespace App\Services;

use InosoftUniversity\SharedModels\User;
use App\Notifications\RegistrationNotification;

class NotificationService
{
    public function sendRegistrationNotification($data)
    {
        $user = User::find($data['user_id']); // Retrieve the user by ID
        if ($user) {
            $user->notify(new RegistrationNotification($data));
        }
    }
}
