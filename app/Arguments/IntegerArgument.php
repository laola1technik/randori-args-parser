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
        $pattern = "/.*?-({$this->name})\s?(-?\d+)?(?:$|\s)+/";
        $foundMatch = preg_match($pattern, $commandLineArguments, $matches);
        $matchCount = count($matches);
        if ($matchCount === 3) {
            $this->value = (int)$matches[2];
        //} elseif ($matchCount === 2) {
        //    $this->value = self::DEFAULT_VALUE;
        } else {
            throw new \InvalidArgumentException(
                "Value supplied for -" . $this->name . " is not an integer."
            );
        }
    }
}