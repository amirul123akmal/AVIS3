<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestEmail extends Mailable
{
    use SerializesModels;

    public $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->subject('This is a Test Email') // Set the subject
                    ->html('<h1>Hello, ' . $this->data['name'] . '</h1><p>' . $this->data['message'] . '</p>'); // Directly return HTML
    }
}