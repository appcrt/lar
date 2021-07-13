<?php

namespace App\classes;

use App\interfaces\PropertyContainerInterface;

class PropertyContainer implements PropertyContainerInterface
{
    public $propertyContainer;

    public function addProperty($propertyName,$value)
    {
        $this->propertyContainer[$propertyName] = $value;
    }
}