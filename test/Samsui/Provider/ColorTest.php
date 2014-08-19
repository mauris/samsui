<?php namespace Samsui\Provider;

use \PHPUnit_Framework_TestCase;
use Samsui\Generator\Generator;

class ColorTest extends PHPUnit_Framework_TestCase
{
    protected $generator;

    protected function setUp()
    {
        $this->generator = new Generator();
        $this->generator->registerProvider('math', new Math($this->generator));
    }

    public function testRandom()
    {
        $provider = new Color($this->generator);
        $color = $provider->random();
        $this->assertInternalType('array', $color);
        $this->assertCount(3, $color);
        $this->assertTrue($color[0] >= 0 && $color[0] <= 255);
        $this->assertTrue($color[1] >= 0 && $color[1] <= 255);
        $this->assertTrue($color[2] >= 0 && $color[2] <= 255);
    }
}
