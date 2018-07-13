<?php

namespace App;


use App\Arguments\Argument;

class ArgumentParser
{
    private $scheme;

    public function __construct(Scheme $scheme)
    {
        $this->scheme = $scheme;
    }

    public function parse($commandLineArguments)
    {
        /** @var Argument $argument */
        foreach ($this->scheme->getArguments() as $argument) {
            $argument->parse($commandLineArguments);
        }
    }

    public function get($name)
    {
        $argument = $this->scheme->get($name);
        return $argument->getValue();
    }
}