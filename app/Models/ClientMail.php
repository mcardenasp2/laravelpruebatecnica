<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ClientMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Build the message.
     *
     * @return $this
     */

    protected $cuerpo;

    public function __construct($cuerpo)
    {
        // $this->destinatario=$request['destinatario'];
        $this->cuerpo=$cuerpo;
    }
    public function build()
    {
        $this->
        from('mcardenasp2@unemi.edu.ec','Marco')
            ->subject('Welcome to Enterprise Solutions!')
            ->
            view('dashboard.email.email')->with([
                'title'=>$this->cuerpo
            ]);

        return $this;
    }
}
