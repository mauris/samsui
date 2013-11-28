<?php

namespace Samsui\Generator\Provider;

use \PHPUnit_Framework_TestCase;
use Samsui\Generator\Generator;

class AddressTest extends PHPUnit_Framework_TestCase
{
    protected $generator;

    protected function setUp()
    {
        $this->generator = new Generator();
        $this->generator->registerProvider('math', new Math($this->generator));
        $this->generator->registerProvider('locale', new Locale($this->generator));
        $this->generator->locale->setLocale('en_SG');
    }

    public function testRandomAddress()
    {
        $provider = new Address($this->generator);
        $address = $provider->random();
        $this->assertTrue(strlen($address) > 0);
    }
}
