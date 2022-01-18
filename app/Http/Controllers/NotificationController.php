<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {

        $id = Auth::user()->id;
        $notif = Notification::where('user_id', $id)->latest()->get();
        $mark_as_read = Notification::where('user_id', $id)->where('read_at', '=', null)->count();

        // $notif = Notification::join('pendaftaran_webinars', 'notifications.pendaftaran_webinar_id', '=', 'pendaftaran_webinars.id')
        //     ->join('webinars', 'pendaftaran_webinars.webinar_id', '=', 'webinars.id')
        //     ->where('pendaftaran_webinars.user_id', $id)
        //     ->select('notifications.info', 'notifications.created_at')
        //     ->get();
        return view('user.notifikasi', compact('notif', 'mark_as_read'));
    }

    public function markAsRead()
    {
        Notification::where('read_at', '=', null)->update(['read_at' => now()]);
        return redirect()->back();
    }
}
