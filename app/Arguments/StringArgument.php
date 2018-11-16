<?php

namespace App\Arguments;

class StringArgument extends Argument
{
    const DEFAULT_VALUE = "";

    /**
     * @return string
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
        return $value;
    }
}