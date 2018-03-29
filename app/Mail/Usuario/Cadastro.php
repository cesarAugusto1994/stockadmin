<?php

namespace App\Mail\Usuario;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Models\UserInformations;

class Cadastro extends Mailable
{
    use Queueable, SerializesModels;

    private $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(UserInformations $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      $email = config('app.email_delivery');

      return $this->from($email)
      ->subject('Confirmação Cadastro StockAdmin')
      ->markdown('emails.usuario.cadastro')
      ->with([
                'url' => 'https://stockadmin-net.umbler.net/',
                'user' => $this->user
            ]);;
    }
}
