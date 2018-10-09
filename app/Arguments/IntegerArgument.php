<?php

namespace App\Arguments;

use App\Arguments\Validators\Validatore;

class IntegerArgument extends Argument
{
    const DEFAULT_VALUE = 0;
    private $value;
    private $validator;

    public function __construct($name, Validatore $validator)
    {
        $this->name = $name;
        $this->value = self::DEFAULT_VALUE;
        $this->validator = $validator;
    }

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