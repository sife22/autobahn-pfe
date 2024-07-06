<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    
    private $data = [];
    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->view('client.mail')
                    ->with(['nom'=>$this->data['nom'] , 'email'=>$this->data['email'] , 'tel'=>$this->data['tel'] ,'messages'=>$this->data['message']])
                    ->subject('Nouveau Message')
                    ->from($this->data['email'], $this->data['nom']);
    }


  
}
