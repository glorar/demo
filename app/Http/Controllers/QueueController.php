<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessSendMail;
use App\Models\User;
use App\Notifications\UserRegisteredNotification;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class QueueController extends Controller
{
    public function sendNotification(Request $request, User $user): JsonResponse
    {
        ProcessSendMail::dispatch($user);

        return response()->json([
            'info' => 'Message sent successfully'
        ]);
    }
}
