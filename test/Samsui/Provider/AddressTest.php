<?php namespace Samsui\Provider;

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

    public function testPostal()
    {
        $provider = new Address($this->generator);
        $postal = $provider->postal();
        $this->assertTrue(strlen($postal) == 6);
    }

    public function testStreet()
    {
        $provider = new Address($this->generator);
        $street = $provider->street();
        $this->assertTrue(strlen($street) > 0);
    }

    public function testUnit()
    {
        $provider = new Address($this->generator);
        $unit = $provider->unit();
        $this->assertRegExp('/^\#\d+\-\d+$/', $unit);
    }

    public function testCountry()
    {
        $provider = new Address($this->generator);
        $country = $provider->country();
        $this->assertEquals('Singapore', $country);
    }

    public function testBlock()
    {
        $provider = new Address($this->generator);
        $block = $provider->block();
        $this->assertInternalType('int', $block);
    }
}
