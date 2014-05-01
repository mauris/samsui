<?php namespace Samsui;

use \PHPUnit_Framework_TestCase;
use Packfire\FuelBlade\Container;

class FactoryTest extends PHPUnit_Framework_TestCase
{
    public function testDefine()
    {
        $factory = new Factory();
        $definition = $factory->define('test');
        $definition2 = $factory->define('test');
        $this->assertEquals($definition, $definition2);
        $this->assertInstanceOf('Samsui\\Definition', $definition);
    }

    public function testOneBuild()
    {
        $factory = new Factory();
        $factory->define('test');
        $object = $factory->build('test');
        $this->assertInstanceOf('Samsui\\Wrapper', $object);
    }

    public function testMultipleBuild()
    {
        $factory = new Factory();
        $factory->define('test');
        $objects = $factory->build('test', 5);
        $this->assertTrue(is_array($objects));
        $this->assertCount(5, $objects);
        $this->assertInstanceOf('Samsui\\Wrapper', $objects[0]);
    }

    /**
     * @expectedException \Exception
     */
    public function testExceptionBuild()
    {
        $factory = new Factory();
        $factory->build('test');
    }

    public function testInverseOfControl()
    {
        $container = new Container();
        $container['Samsui\\DefinitionInterface'] = $container->instance('Samsui\\MockDefinition');

        $factory = new Factory();
        $factory($container);
        $definition = $factory->define('test');
        $this->assertInstanceOf('Samsui\\MockDefinition', $definition);
    }
}
