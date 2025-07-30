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

    public function destroy($id = null)
    {
        if($id == null){
            auth()->user()->notifications()->delete();
            return redirect()->back();
        }

        $notification = auth()->user()->notifications()->find($id);
        $notification->delete();
        return redirect()->back();
    }
}
