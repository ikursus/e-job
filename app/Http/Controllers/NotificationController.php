<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        return view('admin.notifications.index');
    }

    public function read($id)
    {
        $notification = auth()->user()->unreadNotifications()->find($id);
        $notification->markAsRead();
        return redirect()->back();
    }
}
