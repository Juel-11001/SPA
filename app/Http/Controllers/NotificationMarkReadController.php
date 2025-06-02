<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;

class NotificationMarkReadController extends Controller
{
    use AuthorizesRequests;
    /**
     * Handle the incoming request.
     */
    public function __invoke(DatabaseNotification $notification)
    {
        // dd($notification);
        $this->authorize('update', $notification);
        $notification->markAsRead();
        return redirect()->back()->with('success', 'Notification Read!');
    }
}
