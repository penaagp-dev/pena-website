<?php

namespace App\Helper;

use App\Mail\registerCaMail;
use Illuminate\Support\Facades\Mail;

class EmailHandler {
    public static function sendWaLink($email,$data)
    {
        $token = $data->email_token;
        $expiresAt = $data->expires_at;
        $verificationUrl = url("/api/v1/register-ca/verify-email-exp/{$token}");
    
        Mail::to($email)->send(new RegisterCaMail($verificationUrl, $expiresAt));
    }
    
}