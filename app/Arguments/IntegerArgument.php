<?php

namespace App\Arguments;

class IntegerArgument extends Argument
{
    const DEFAULT_VALUE = 0;

    /**
     * @return int
     */
    public function getValue()
    {
        return $this->value;
    }

    protected function setValue($matches)
    {
        $this->validator->validate($this, $matches);
        $this->value = $this->getArgumentValue($matches[2]);
    }

    private function getArgumentValue($value)
    {
        return (int)$value;
    }
}