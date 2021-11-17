<?php

namespace App\Events;



use App\Listeners\SendMailFired;
use App\Mail\TestMail;
use Illuminate\Broadcasting\PrivateChannel;

use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;


class SendMail implements ShouldQueue
{
    use InteractsWithQueue;


    public function __construct()
    {
        //
    }
//StockWasPurchased $event
    public function handle(SendMailFired $event)
    {
        Mail::to('YOlo@yol.com')->send(new TestMail());
    }
}
