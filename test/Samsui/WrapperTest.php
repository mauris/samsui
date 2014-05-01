<?php namespace Samsui;

use \PHPUnit_Framework_TestCase;

class WrapperTest extends PHPUnit_Framework_TestCase
{
    public function testProperties()
    {
        $wrapper = new Wrapper(
            array('name' => 'John Sim'),
            array()
        );

        $this->assertEquals('John Sim', $wrapper->name);
        $wrapper->name = 'Gummy Bear';
        $this->assertEquals('Gummy Bear', $wrapper->name);
        $this->assertTrue(isset($wrapper->name));
        unset($wrapper->name);
        $this->assertFalse(isset($wrapper->name));
    }

    public function testSerialize()
    {
        $wrapper = new Wrapper(
            array('name' => 'John Sim'),
            array()
        );

        $serialized = serialize($wrapper);
        $wrapper = unserialize($serialized);

        $this->assertEquals('John Sim', $wrapper->name);
    }

    public function testMethod()
    {
        $wrapper = new Wrapper(
            array(),
            array(
                'number' => function () {
                    return 3;
                }
            )
        );
        $this->assertEquals(3, $wrapper->number());
    }

    /**
     * @expectedException \Exception
     */
    public function testMethodFail()
    {
        $wrapper = new Wrapper(
            array(),
            array()
        );

        $wrapper->noExists();
    }
}
