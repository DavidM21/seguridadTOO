<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailVerification extends Mailable
{
    use Queueable, SerializesModels;

    public $password;
    public $user;

    /**
     * Create a new message instance.
     *
     * @param User $user
     * @param string $temp_password
     */
    public function __construct(User $user, string $temp_password)
    {
        $this->user = $user;
        $this->password = $temp_password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Verificación de Correo Electrónico')->view('mails.auth.verify');
    }
}
