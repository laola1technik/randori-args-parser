<?php

namespace App\Arguments;


class StringArgument implements Argument
{

    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return "/usr/logs";
    }
}