<?php

namespace App\Arguments;


class IntegerArgument
{

    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }
}