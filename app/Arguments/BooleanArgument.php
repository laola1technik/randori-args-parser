<?php

namespace App\Arguments;


class BooleanArgument implements Argument
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
     * @return bool
     */
    public function getValue()
    {
        return $this->value;
    }

    public function setValue($commandLineArguments)
    {
        $this->value = strpos($commandLineArguments, "-" . $this->name) !== false;
    }
}