<?php

namespace App;


use App\Arguments\BooleanArgument;

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
            if ($argument instanceof BooleanArgument) {
                $argument->setValue(strpos($commandLineArguments, "-l") !== -1);
            }
        }


    }

    public function get($name)
    {
        $argument = $this->scheme->get($name);
        return $argument->getValue();
    }
}