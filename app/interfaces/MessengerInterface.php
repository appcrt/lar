<?php

namespace App\interfaces;

interface MessengerInterface
{
    public function setSender($value);
    public function setRecipient($value);
    public function setMessage($value);
}