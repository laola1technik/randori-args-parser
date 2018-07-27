<?php

namespace App\Arguments;


class IntegerArgument implements Argument
{
    const DEFAULT_VALUE = 0;

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
        $nameAndValuePattern = "/.*?-({$this->name})\s*(\S+|-\d+)?/";
        $integerPattern = "/^-?\d+$/";

        $foundMatch = preg_match($nameAndValuePattern, $commandLineArguments, $matches);
        $matchCount = count($matches);
        if ($foundMatch) {
            if ($matchCount === 3) {
                $isInteger = preg_match($integerPattern, $matches[2]);
                if ($isInteger) {
                    $this->value = (int)$matches[2];
                } else {
                    throw new \InvalidArgumentException(
                        "Value supplied for -" . $this->name . " is not an integer."
                    );
                }
            } else {
                $this->value = self::DEFAULT_VALUE;
            }
        }
    }
}