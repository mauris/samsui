<?php namespace Samsui\Provider;

use \PHPUnit_Framework_TestCase;
use Samsui\Generator\Generator;
use Carbon\Carbon;

class DateTest extends PHPUnit_Framework_TestCase
{
    protected $generator;

    protected function setUp()
    {
        $this->generator = new Generator();
        $this->generator->registerProvider('math', new Math($this->generator));
    }

    public function testPast()
    {
        $provider = new Date($this->generator);
        $result = $provider->past('2 days');
        $this->assertInstanceOf('Carbon\\Carbon', $result);
        $this->assertTrue($result->timestamp > strtotime('- 2 days') && $result->timestamp < time());
    }

    public function testBetween()
    {
        $provider = new Date($this->generator);
        $result = $provider->between('2014-02-04 00:00:00', '2014-02-06 00:00:00');
        $this->assertInstanceOf('Carbon\\Carbon', $result);
        $this->assertEquals('2014-02', $result->format('Y-m'));
        $this->assertTrue(in_array($result->format('j'), array('4', '5', '6')));
    }

    public function testInterval()
    {
        $provider = new Date($this->generator);
        $startDate = new Carbon('2014-02-04 00:00:00');
        $result = $provider->interval($startDate, '2014-02-14 00:00:00', '1 day');
        $this->assertCount(10, $result);
        foreach ($result as $idx => $date) {
            $this->assertInstanceOf('Carbon\\Carbon', $date);
            $count = $date->diffInDays($startDate);
            $this->assertEquals($idx + 1, $count);
        }
    }

    public function testFarFuture()
    {
        $provider = new Date($this->generator);
        $result = $provider->farFuture(8);
        $this->assertInstanceOf('Carbon\\Carbon', $result);
        $this->assertTrue($result->timestamp >= strtotime('+7 years') && $result->timestamp <= strtotime('+9 years'));
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testFarFuture2()
    {
        $provider = new Date($this->generator);
        $provider->farFuture('test');
    }
}
