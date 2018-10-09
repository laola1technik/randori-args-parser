<?php

namespace tests;

use App\ArgumentParser;
use App\Arguments\BooleanArgument;
use App\Arguments\IntegerArgument;
use App\Arguments\StringArgument;
use App\Arguments\Validators\BooleanValidator;
use App\Arguments\Validators\IntegerValidator;
use App\Arguments\Validators\StringValidator;
use App\Scheme;

class ArgumentsParserTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function should_parse_arguments()
    {
        $commandLineArguments = '-l -p 8080 -d /usr/logs';
        $arguments = [
            new BooleanArgument("l", new BooleanValidator()),
            new IntegerArgument("p", new IntegerValidator()),
            new StringArgument("d", new StringValidator())
        ];
        $scheme = new Scheme($arguments);
        $argumentParser = new ArgumentParser($scheme);

        $argumentParser->parse($commandLineArguments);

        $this->assertTrue($argumentParser->get("l"));
        $this->assertSame(8080, $argumentParser->get("p"));
        $this->assertSame("/usr/logs", $argumentParser->get("d"));
    }
}
