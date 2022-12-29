<?php

namespace App\Services;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;



class MailService
{
    public function send_mail($page, $user, $subject, $messages): void
    {
        $details = [
            'page' => $page,
            'email'=>$user->email,
            'name'=>$user->name,
            'subject' => $subject,
            'messages' => $messages

        ];
        Mail::to($user->email)->send(new SendMail($details));

    }
    
}