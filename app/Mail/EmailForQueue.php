<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class EmailForQueue extends Mailable
{
    use Queueable, SerializesModels;

    protected $title;
    protected $asunto;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($title,$asunto)
    {
        $this->title=$title;
        $this->asunto=$asunto;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // quien envia
        return $this->from('marco.cardenas1702@gmail.com','Marco')
        // return $this->from(Auth::user()->email,Auth::user()->name)
            ->subject($this->asunto)
            ->view('dashboard.email.email')
            ->with([
                'title'=>$this->title
            ]);
    }
}
