<?php

namespace App\Arguments;


class BooleanArgument
{

    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }
}