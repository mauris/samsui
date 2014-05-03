<?php namespace Samsui\Generator\Provider;

use \PHPUnit_Framework_TestCase;
use Samsui\Generator\Generator;

class TelephoneTest extends PHPUnit_Framework_TestCase
{
    protected $generator;

    protected function setUp()
    {
        $this->generator = new Generator();
        $this->generator->registerProvider('math', new Math($this->generator));
        $this->generator->registerProvider('locale', new Locale($this->generator));
        $this->generator->locale->setLocale('en_SG');
    }

    public function testTelephone()
    {
        $provider = new Telephone($this->generator);
        $telephone = $provider->telephone();
        $this->assertRegExp('/^656\d{7}$/', $telephone);
    }

    public function testNumber()
    {
        $provider = new Telephone($this->generator);
        $number = $provider->number();
        $this->assertRegExp('/^\d{8}$/', $number);
    }

    public function testCountryCode()
    {
        $provider = new Telephone($this->generator);
        $countryCode = $provider->countryCode();
        $this->assertEquals('65', $countryCode);
    }
}
