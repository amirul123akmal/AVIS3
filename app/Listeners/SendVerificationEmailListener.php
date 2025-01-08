<?php

namespace App\Listeners;

use App\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendVerificationEmailListener
{
    public function __construct()
    {
    }

    public function handle(Registered $event)
    {
        SendVerificationEmail::dispatch($event->user);
    }
}
