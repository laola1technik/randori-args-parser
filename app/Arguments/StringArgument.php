<?php

namespace App\Arguments;


class StringArgument
{

    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }
}