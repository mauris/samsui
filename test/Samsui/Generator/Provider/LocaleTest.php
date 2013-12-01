<?php

namespace Samsui\Generator\Provider;

use \PHPUnit_Framework_TestCase;
use Samsui\Generator\Generator;

class LocaleTest extends PHPUnit_Framework_TestCase
{
    protected $generator;

    protected function setUp()
    {
        $this->generator = new Generator();
    }

    public function testFetchEmpty()
    {
        $provider = new Locale($this->generator);
        $this->assertNull($provider->fetch('non-exists'));
    }
}
