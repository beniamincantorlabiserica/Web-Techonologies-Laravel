<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class NotificationController extends Controller
{
    public function getNewNotifications()
    {
        try {
            $notifications = Notification::where('user_id', auth()->id())
                ->where('read', false)
                ->with(['sender', 'post'])
                ->orderBy('created_at', 'desc')
                ->get();

            return response()->json([
                'status' => 'success',
                'data' => $notifications
            ]);
        } catch (\Exception $e) {
            Log::error('Error fetching notifications: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Error fetching notifications'
            ], 500);
        }
    }

    public function markAsRead(Notification $notification)
    {
        try {
            if ($notification->user_id !== auth()->id()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Unauthorized'
                ], 403);
            }

            $notification->update(['read' => true]);
            
            return response()->json([
                'status' => 'success',
                'message' => 'Notification marked as read'
            ]);
        } catch (\Exception $e) {
            Log::error('Error marking notification as read: ' . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'Error marking notification as read'
            ], 500);
        }
    }
}