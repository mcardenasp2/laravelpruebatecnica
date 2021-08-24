<?php

namespace App\Jobs;

use App\Mail\EmailForQueue;
use App\Models\Email;
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

    protected $title;
    protected $asunto;
    protected $email;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct( $email,$title,$asunto)
    {
        $this->title=$title;
        $this->email=$email;
        $this->asunto=$asunto;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $email=new EmailForQueue($this->title,$this->asunto);
        Mail::to($this->email)->send($email);
    }
}
