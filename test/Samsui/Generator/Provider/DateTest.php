<?php namespace Samsui\Generator\Provider;

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
}
