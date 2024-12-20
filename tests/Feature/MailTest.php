<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Mail;
use Tests\TestCase;
use App\Mail\TestEmail;

class MailTest extends TestCase
{
    public function it_sends_a_test_email()
    {
        // Arrange: Prepare any data you need for the test
        $recipientEmail = 'test@example.com';
        $data = [
            'name' => 'John Doe',
            'message' => 'This is a test message.',
        ];

        // Act: Send the email
        Mail::to($recipientEmail)->send(new TestEmail($data));
        // Assert: Check that the email was sent
        Mail::assertSent(TestEmail::class, function ($mail) use ($recipientEmail, $data) {
            // dd($mail->viewData);

            return $mail->hasTo($recipientEmail) &&
                $mail->viewData['name'] === $data['name'] &&
                $mail->viewData['message'] === $data['message'];
        });
    }
}