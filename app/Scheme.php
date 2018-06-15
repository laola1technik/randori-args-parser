<?php

namespace App;


use App\Arguments\Argument;
use App\Exceptions\ArgumentNotFoundException;

class Scheme
{
    /** @var Argument[] */
    private $arguments;

    /* @param Argument[] */
    public function __construct($arguments)
    {
        $this->arguments = $arguments;
    }

    /**
     * @param $name
     * @return Argument
     * @throws ArgumentNotFoundException
     */
    public function get($name)
    {
        foreach ($this->arguments as $argument) {
            if ($argument->getName() === $name) {
                return $argument;
            }
        }

        throw new ArgumentNotFoundException();
    }

    public function getArguments()
    {
        return $this->arguments;
    }
}