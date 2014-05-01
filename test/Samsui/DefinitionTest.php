<?php namespace Samsui;

use \PHPUnit_Framework_TestCase;

class DefinitionTest extends PHPUnit_Framework_TestCase
{
    public function testSequence()
    {
        $definition = new Definition();
        $definition->sequence('name')->sequence('number');

        $obj1 = $definition->build();
        $this->assertEquals(1, $obj1->name);
        $this->assertEquals(1, $obj1->number);

        for ($i = 2; $i < 10; ++$i) {
            $obj = $definition->build();
            $this->assertEquals($i, $obj->name);
            $this->assertEquals($i, $obj->number);
        }
    }

    public function testAttributes()
    {
        $definition = new Definition();
        $definition
            ->attr('age', 10)
            ->attr('category', function ($i) {
                return $i;
            });

        $obj1 = $definition->build();
        $this->assertEquals(10, $obj1->age);
        $this->assertEquals(1, $obj1->category);

        for ($i = 2; $i < 10; ++$i) {
            $obj = $definition->build();
            $this->assertEquals(10, $obj->age);
            $this->assertEquals($i, $obj->category);
        }
    }

    public function testMethods()
    {
        $definition = new Definition();
        $definition
            ->method('code', function () {
                return true;
            })
            ->method('repeat', function ($text) {
                return $text;
            });

        $obj1 = $definition->build();
        $this->assertEquals(true, $obj1->code());
        $this->assertEquals('test', $obj1->repeat('test'));

        for ($i = 2; $i < 10; ++$i) {
            $obj = $definition->build();
            $this->assertEquals(true, $obj->code());
            $this->assertEquals('test', $obj->repeat('test'));
        }
    }
}
