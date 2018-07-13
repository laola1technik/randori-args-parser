<?php

namespace App\Arguments;


class IntegerArgument implements Argument
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
     * @return int
     */
    public function getValue()
    {
        return $this->value;
    }

    public function parse($commandLineArguments)
    {
        $pattern = "/.*?-{$this->name} (-?\d+)/";
        $foundMatch = preg_match($pattern, $commandLineArguments, $matches);
        if($foundMatch) {
            $this->value = (int)$matches[1];
        } else {
            throw new \InvalidArgumentException(
                "Value supplied for -" . $this->name . " is not an integer."
            );
        }
    }
}