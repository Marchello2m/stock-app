<?php

namespace App\Listeners;

use App\Events\SendMail;
use App\Mail\TestMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;


class SendMailFired  implements ShouldQueue
{

    public function __construct()
    {
        //
    }


    public function handle(SendMail $event)
    {
        Mail::to('Marchello2m@gmail.com')->send(new TestMail());
    }
}
