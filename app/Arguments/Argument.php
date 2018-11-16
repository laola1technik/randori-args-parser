<?php

namespace App\Arguments;

abstract class Argument
{
    protected $name;

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function parse($commandLineArguments)
    {
        $nameAndValuePattern = "/.*?-({$this->name})\s*(\S+)?/";

        $argumentFound = preg_match($nameAndValuePattern, $commandLineArguments, $matches);
        if (!$argumentFound) {
            return;
        }

        $this->setValue($matches);
    }

    abstract protected function setValue($matches);
}