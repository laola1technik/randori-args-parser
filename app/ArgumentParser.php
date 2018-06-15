<?php

namespace App;


use App\Arguments\BooleanArgument;
use App\Arguments\IntegerArgument;

class ArgumentParser
{
    private $scheme;

    public function __construct(Scheme $scheme)
    {
        $this->scheme = $scheme;
    }

    public function parse($commandLineArguments)
    {
        foreach ($this->scheme->getArguments() as $argument) {
            $argument->setValue($commandLineArguments);
        }


    }

    public function get($name)
    {
        $argument = $this->scheme->get($name);
        return $argument->getValue();
    }
}