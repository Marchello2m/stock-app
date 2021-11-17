<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

public $subject ='test';

    public function __construct()
    {
        //
    }

    public function build()
    {
        return $this->view('mail.test-mail');
    }
}
