<?php

namespace App\Arguments;

use App\Arguments\Validators\Validatore;

class BooleanArgument extends Argument
{
    const DEFAULT_VALUE = false;
    private $value;
    private $validator;

    public function __construct($name, Validatore $validator)
    {
        $this->name = $name;
        $this->value = self::DEFAULT_VALUE;
        $this->validator = $validator;
    }

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
