<?php

namespace Tests;


use App\Arguments\BooleanArgument;
use App\Arguments\IntegerArgument;
use App\Scheme;

class SchemeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function should_return_only_argument_by_name()
    {
        $name = "b";
        $argument = new BooleanArgument($name);
        $scheme = new Scheme([$argument]);

        $returnedArgument = $scheme->get($name);

        $this->assertSame($argument, $returnedArgument);
    }

    /**
     * @test
     */
    public function should_return_argument_by_name_from_multiple_arguments()
    {
        $name = "i";
        $arguments[] = new BooleanArgument("h");
        $arguments[] = new IntegerArgument($name);
        $scheme = new Scheme($arguments);

        $returnedArgument = $scheme->get($name);

        $this->assertSame($arguments[1], $returnedArgument);
    }

    /**
     * @test
     * @expectedException \App\Exceptions\ArgumentNotFoundException
     */
    public function should_fail_if_argument_not_found()
    {
        $scheme = new Scheme([]);
        $scheme->get("x");
    }
}
