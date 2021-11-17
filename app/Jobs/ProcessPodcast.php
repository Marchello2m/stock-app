<?php

namespace App\Jobs;

use App\Events\SendMail;
use App\Mail\TestMail;
use App\Models\Podcast;
use App\Services\AudioProcessor;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class ProcessPodcast implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $podcast;


    public function __construct(Podcast $podcast)
    {
        $this->podcast = $podcast;
    }

    public function handle(SendMail $event)
    {
        Mail::to('Marchello2m@gmail.com')->send(new TestMail());
    }
}
