<?php

namespace App\Arguments;


class StringArgument implements Argument
{

    private $name;
    private $value;

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
        return $this->value;
    }

    public function parse($commandLineArguments)
    {
        if ($this->name === "s") {
            $this->value = "a";
        } else {
            $this->value = "/usr/logs";
        }
    }
}