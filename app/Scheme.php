<?php

namespace App;


use App\Exceptions\ArgumentNotFoundException;

class Scheme
{
    private $arguments;

    /* @param array */
    public function __construct($arguments)
    {
        $this->arguments = $arguments;
    }

    /**
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
}