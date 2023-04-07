<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ResetPassword extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $email;
    public $id;

    public function __construct($email,$id)
    {
        $this->email = $email;
        $this->id = $id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $user['email'] = $this->email;
        $user['id'] = $this->id;

        return $this->from("kdipanshu396@gmail.com", "Dipanshu kumar")
            ->subject('Password Reset Link')
            ->view('Frontendtheme.Auth.resetpassword', ['user' => $user]);
    }
}
