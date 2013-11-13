<?php

namespace Samsui\Generator\Provider;

use \PHPUnit_Framework_TestCase;
use Samsui\Generator\Generator;

class LipsumTest extends PHPUnit_Framework_TestCase
{
    protected $generator;

    protected function setUp()
    {
        $this->generator = new Generator();
        $this->generator->registerProvider('math', new Math($this->generator));
    }

    public function testWord()
    {
        $provider = new Lipsum($this->generator);
        $this->assertRegExp('/^[a-z]+$/', $provider->word());
    }
}
