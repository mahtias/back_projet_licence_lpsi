<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendPassword extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    public $name;
    public $email;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data,$name,$email)
    {
        $this->data = $data;
        $this->name = $name;
        $this->email=$email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('dcfinfo@kognishare.com')
            ->view('mail.sendPassword')->subject("Mot de passe de connection  AGO Project")->with([ 'code' => $this->data,"name"=>$this->name,"mail"=>$this->email]);
    }
}
