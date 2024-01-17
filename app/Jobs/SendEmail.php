<?php

namespace App\Jobs;

use App\Mail\CreateAnswer;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $email ;
    public $polesArray;

    public $userName;
    /**
     * Create a new job instance.
     */
    public function __construct($email,$polesArray,$userName)
    {
        $this->email = $email;
        $this->polesArray = $polesArray;
        $this->userName = $userName;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->email)->send(new CreateAnswer([$this->polesArray,$this->userName]));
    }
}
