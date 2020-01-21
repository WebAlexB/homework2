<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class mailController extends Controller
{
    public function send($user)
    {
            Mail::send('email_view', ['user' => $user], function ($message) use ($user) {
                $message->from('belousalek2@gmail.com', 'Sender');
                $message->to($user->email, $user->name)->subject('Test message');

        });
    }
}
