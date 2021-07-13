<?php

namespace App\classes;

use App\interfaces\MessengerInterface;

abstract class AppMessenger implements MessengerInterface
{
    protected $sender;
    protected $recipient;
    protected $message;

    public function setSender($value)
    {
        $this->sender = $value;
    }

    public function setMessage($value)
    {
        $this->message = $value;
    }

    public function setRecipient($value)
    {
        $this->recipient = $value;
    }

    public function send(){
        return true;
    }
}