<?php

namespace Samsui\Generator\Provider;

use \PHPUnit_Framework_TestCase;
use Samsui\Generator\Generator;

class GPSTest extends PHPUnit_Framework_TestCase
{
    protected $generator;

    protected function setUp()
    {
        $this->generator = new Generator();
        $this->generator->registerProvider('math', new Math($this->generator));
    }

    public function testLatitude()
    {
        $provider = new GPS($this->generator);
        $latitude = $provider->latitude();
        $this->assertInternalType('float', $latitude);
        $this->assertTrue($latitude >= -90 && $latitude <= 90);
    }

    public function testLongitude()
    {
        $provider = new GPS($this->generator);
        $longitude = $provider->longitude();
        $this->assertInternalType('float', $longitude);
        $this->assertTrue($longitude >= -180 && $longitude <= 180);
    }

    public function testLatLon()
    {
        $provider = new GPS($this->generator);
        $latlon = $provider->latlon();
        $this->assertInternalType('array', $latlon);
        $this->assertTrue($latlon['latitude'] >= -90 && $latlon['latitude'] <= 90);
        $this->assertTrue($latlon['longitude'] >= -180 && $latlon['longitude'] <= 180);
    }
}
