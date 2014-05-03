<?php namespace Samsui\Provider;

use \PHPUnit_Framework_TestCase;
use Samsui\Generator\Generator;

class GenderTest extends PHPUnit_Framework_TestCase
{
    protected $generator;

    protected function setUp()
    {
        $this->generator = new Generator();
        $this->generator->registerProvider('math', new Math($this->generator));
    }

    public function testPick()
    {
        $provider = new Gender($this->generator);
        $gender = $provider->pick();
        $this->assertInternalType('string', $gender);
        $this->assertTrue(in_array($gender, array('M', 'F')));
    }

    public function testPick2()
    {
        $provider = new Gender($this->generator);
        $gender = $provider->pick(array('Nail', 'Hole'));
        $this->assertInternalType('string', $gender);
        $this->assertTrue(in_array($gender, array('Nail', 'Hole')));
    }

    public function testBirthRatio()
    {
        $provider = new Gender($this->generator);
        $gender = $provider->birthRatio();
        $this->assertInternalType('string', $gender);
        $this->assertTrue(in_array($gender, array('M', 'F')));
    }

    public function testBirthRatio2()
    {
        $provider = new Gender($this->generator);
        $gender = $provider->birthRatio(array('Male' => 1, 'Female' => 0));
        $this->assertInternalType('string', $gender);
        $this->assertEquals('Male', $gender);
    }
}
