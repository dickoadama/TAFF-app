<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PushNotification;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = PushNotification::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);
            
        return view('notifications.index', compact('notifications'));
    }
    
    public function unread()
    {
        $notifications = PushNotification::where('user_id', Auth::id())
            ->where('is_read', false)
            ->orderBy('created_at', 'desc')
            ->get();
            
        return response()->json($notifications);
    }
    
    public function markAsRead($id)
    {
        $notification = PushNotification::where('user_id', Auth::id())->findOrFail($id);
        $notification->update([
            'is_read' => true,
            'read_at' => now()
        ]);
        
        return response()->json(['success' => true]);
    }
    
    public function markAllAsRead()
    {
        PushNotification::where('user_id', Auth::id())
            ->where('is_read', false)
            ->update([
                'is_read' => true,
                'read_at' => now()
            ]);
            
        return response()->json(['success' => true]);
    }
    
    public function destroy($id)
    {
        $notification = PushNotification::where('user_id', Auth::id())->findOrFail($id);
        $notification->delete();
        
        return response()->json(['success' => true]);
    }
}
