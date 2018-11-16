<?php

namespace App\Arguments;

class BooleanArgument extends Argument
{
    const DEFAULT_VALUE = false;

    /**
     * @return bool
     */
    public function getValue()
    {
        return $this->value;
    }

    protected function setValue($matches)
    {
        $this->validator->validate($this, $matches);
        $this->value = true;
    }
}
