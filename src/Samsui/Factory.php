<?php

namespace Samsui;

use Packfire\FuelBlade\ConsumerInterface;
use Packfire\FuelBlade\Container;

class Factory implements FactoryInterface, ConsumerInterface
{
    protected $container;

    protected $objects;

    public function __construct()
    {
        $this->objects = new ObjectCollection();
        $this->container = new Container();
        $this->container['Samsui\\DefinitionInterface'] = $this->container->instance('Samsui\\Definition');
    }

    public function define($name)
    {
        if (!$this->objects->get($name)) {
            $this->objects->set($name, $this->container['Samsui\\DefinitionInterface']);
        }
        return $this->objects->get($name);
    }

    public function build($name, $quantity = 1)
    {
        if ($definition = $this->objects->get($name)) {
            $result = array();
            for ($i = 0; $i < $quantity; ++$i) {
                $result[] = $definition->build();
            }
            if ($quantity == 1) {
                $result = $result[0];
            }
            return $result;
        }
        throw new \Exception('Tried to build undefined Samsui definition "' . $name . '".');
    }

    public function __invoke($container)
    {
        $this->container = $container;
    }
}
