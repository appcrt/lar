<?php

namespace App\classes;

use App\interfaces\MessengerInterface;

class EmailMessenger extends AppMessenger
{
    public function send()
    {
        dd('from email');
        return parent::send(); // TODO: Change the autogenerated stub
    }
}