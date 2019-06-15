<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactUs extends Mailable {
  use Queueable, SerializesModels;

  public $name;
  public $email;
  public $customerMessage;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $email, $customerMessage) {
      $this->name = $name;
      $this->email = $email;
      $this->customerMessage = $customerMessage;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
      return $this->view('client.mails.contact-us')->subject("Bookie Customer Contact");
    }
  }
