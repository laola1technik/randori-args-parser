<?php

namespace App\Arguments;

use App\Arguments\Validators\StringValidator;

class StringArgument extends Argument
{
    const DEFAULT_VALUE = "";
    private $value;

    public function __construct($name)
    {
        $this->name = $name;
        $this->value = self::DEFAULT_VALUE;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    protected function setValue($matches)
    {
        $validator = new StringValidator($this);
        $validator->validate($matches);
        $this->value = $this->getArgumentValue($matches[2]);
    }

    private function getArgumentValue($value)
    {
        return $value;
    }

}