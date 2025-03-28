<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestEmail;


class SendEmail extends Controller
{
public function sendMail(Request $request, $to, $message)
{
    $data = [
        'name' => 'Hai',
        'message'=> $message
    ];
    Mail::to($to)->send(new TestEmail($data));

    return response()->json(['message' => 'Email sent successfully!'], 200);
}
}
