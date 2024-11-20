<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Services\NotificationService;
use Illuminate\Support\Facades\Log;

class NotificationController extends Controller
{
    protected $notificationService;

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }

    public function handleNotification(Request $request): JsonResponse
    {
        $data = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'name' => 'required|string',
            'course' => 'required|string',
        ]);
        
        $this->notificationService->sendRegistrationNotification($data);
        
        return response()->json(['message' => 'Notification sent successfully']);
    }
}
