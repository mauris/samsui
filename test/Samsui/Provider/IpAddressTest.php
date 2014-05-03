<?php namespace Samsui\Provider;

use \PHPUnit_Framework_TestCase;
use Samsui\Generator\Generator;

class IpAddressTest extends PHPUnit_Framework_TestCase
{
    protected $generator;

    protected function setUp()
    {
        $this->generator = new Generator();
        $this->generator->registerProvider('math', new Math($this->generator));
    }

    public function testV4()
    {
        $provider = new IpAddress($this->generator);
        $ip = $provider->v4();
        $this->assertRegExp('/^\d+.\d+.\d+.\d+$/', $ip);
        $parts = explode('.', $ip);
        $this->assertCount(4, $parts);
        $this->assertRegExp('/^\d+$/', $parts[0]);
        $this->assertRegExp('/^\d+$/', $parts[1]);
        $this->assertRegExp('/^\d+$/', $parts[2]);
        $this->assertRegExp('/^\d+$/', $parts[3]);
    }

    public function testV42()
    {
        $provider = new IpAddress($this->generator);
        $ip = $provider->v4(192, 168);
        $this->assertRegExp('/^192.168.\d+.\d+$/', $ip);
        $parts = explode('.', $ip);
        $this->assertCount(4, $parts);
        $this->assertEquals(192, $parts[0]);
        $this->assertEquals(168, $parts[1]);
        $this->assertRegExp('/^\d+$/', $parts[2]);
        $this->assertRegExp('/^\d+$/', $parts[3]);
    }

    public function testV43()
    {
        $provider = new IpAddress($this->generator);
        $ip = $provider->v4(0, 0, 0, 0);
        $this->assertRegExp('/^0.0.0.0$/', $ip);
        $parts = explode('.', $ip);
        $this->assertCount(4, $parts);
        $this->assertEquals(0, $parts[0]);
        $this->assertEquals(0, $parts[1]);
        $this->assertEquals(0, $parts[2]);
        $this->assertEquals(0, $parts[3]);
    }

    public function testV6()
    {
        $provider = new IpAddress($this->generator);
        $ip = $provider->v6();
        $this->assertRegExp('/^[a-f0-9]{4}\:[a-f0-9]{4}\:[a-f0-9]{4}\:[a-f0-9]{4}\:[a-f0-9]{4}\:[a-f0-9]{4}\:[a-f0-9]{4}\:[a-f0-9]{4}$/', $ip);
        $parts = explode(':', $ip);
        $this->assertCount(8, $parts);
    }

    public function testV62()
    {
        $provider = new IpAddress($this->generator);
        $ip = $provider->v6('abcd');
        $this->assertRegExp('/^[a-f0-9]{4}\:[a-f0-9]{4}\:[a-f0-9]{4}\:[a-f0-9]{4}\:[a-f0-9]{4}\:[a-f0-9]{4}\:[a-f0-9]{4}\:[a-f0-9]{4}$/', $ip);
        $parts = explode(':', $ip);
        $this->assertCount(8, $parts);
        $this->assertEquals('abcd', $parts[0]);
    }
}
