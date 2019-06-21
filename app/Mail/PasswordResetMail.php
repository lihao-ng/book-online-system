<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PasswordResetMail extends Mailable {
  use Queueable, SerializesModels;

  public $email;
  public $codeUrl;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $codeUrl) {
      $this->email = $email;
      $this->codeUrl = $codeUrl;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
      return $this->view('client.mails.password-reset')->subject("Bookie Password Reset");
    }
  }
