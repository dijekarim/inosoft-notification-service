<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationController;

Route::post('/send-notification', [NotificationController::class, 'handleNotification'])->name('send-notification');
