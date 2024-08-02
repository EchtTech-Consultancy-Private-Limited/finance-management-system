<?php
use Illuminate\Support\Facades\Crypt;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

function notifications()
{
    $notifications = Notification::where('receiver_id', Auth::id())->orderBy('id','desc')->get();
    return $notifications;
}

function senderName($senderId)
{
    $senderName = User::where('id', $senderId)->pluck('name')->first();
    return $senderName;
}

?>