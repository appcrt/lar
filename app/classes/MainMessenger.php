<?php

namespace App\classes;

use App\interfaces\MessengerInterface;

class MainMessenger implements MessengerInterface
{
    protected $messenger;

    public function __construct()
    {
        $this->toEmail();
    }

    public function toEmail(){
        $this->messenger = new EmailMessenger();
        return $this;
    }

    public function toSms(){
        $this->messenger = new SmsMessenger();
        return $this;
    }

    public function setSender($value)
    {
        $this->messenger->setSender($value);
        return $this->messenger;
    }

    public function setMessage($value)
    {
        $this->messenger->setMessage($value);
        return $this->messenger;
    }

    public function setRecipient($value)
    {
        $this->messenger->setRecipient($value);
        return $this->messenger;
    }

    public function send(){
        $this->messenger->send();
    }
}