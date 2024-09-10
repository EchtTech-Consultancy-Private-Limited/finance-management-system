<?php

use App\Models\Institute;
use Illuminate\Support\Facades\Crypt;
use App\Models\Notification;
use App\Models\UcForm;
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
    $senderName = User::where('id', $senderId)->first();
    if($senderName){
        if(Auth::user()->user_type == 0){
            $senderName = Institute::where('id', $senderName->institute_id)->first();
        }
        return $senderName;
    }
}

function ucForm()
{
    $ucForm = UcForm::where('status', '1')
            ->orderBy('created_at', 'desc')
            ->first();
    if($ucForm){
        return $ucForm->file;
    }
}

?>