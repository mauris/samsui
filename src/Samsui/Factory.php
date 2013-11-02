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
        if (!isset($this->objects[$name])) {
            $this->objects[$name] = new Definition();
        }
        return $this->objects[$name];
    }

    public function build($name, $quantity = 1)
    {
        if (isset($this->objects[$name])) {
            $result = array();
            for ($i = 0; $i < $quantity; ++$i) {
                $result[] = $this->objects[$name]->build();
            }
            if ($quantity == 1) {
                $result = $result[0];
            }
            return $result;
        }
    }

    public function __invoke($container)
    {
        $this->container = $container;
    }
}
