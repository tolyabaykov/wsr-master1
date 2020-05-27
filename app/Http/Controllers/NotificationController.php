<?php

namespace App\Http\Controllers;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public  function index (){
        Notification::send($user, new App\Notifications\InvoicePaid);
    }

}
