<?php

namespace Samsui;

use Packfire\FuelBlade\ConsumerInterface;
use Packfire\FuelBlade\Container;

class Factory implements FactoryInterface, ConsumerInterface
{
    /**
     * The FuelBlade IoC container
     * @var Packfire\FuelBlade\ConainerInterface
     * @since 1.0.0
     */
    protected $container;

    /**
     * The collection of object definitions
     * @var Samsui\ObjectCollection
     * @since 1.0.0
     */
    protected $objects;

    /**
     * Create a Factory object
     * @since 1.0.0
     */
    public function __construct()
    {
        $this->objects = new ObjectCollection();
        $this->container = new Container();
        $this->container['Samsui\\DefinitionInterface'] = $this->container->instance('Samsui\\Definition');
    }

    /**
     * Define a object build definition
     * @param string $name The identifier of the object to be defined
     * @return Samsui\DefinitionInterface Returns the Definition for building the object
     * @since 1.0.0
     */
    public function define($name)
    {
        if (!$this->objects->get($name)) {
            $this->objects->set($name, $this->container['Samsui\\DefinitionInterface']);
        }
        return $this->objects->get($name);
    }

    /**
     * Build objects using the build definition
     * @param string $name The identifier of the build definition
     * @param int $quantity (optional) The number of objects to build, defaults to 1 only. If the quantity specified is more than 1, an array of objects will be returned instead of just the object.
     * @return mixed|array Returns the resulting object. If the quantity is more than one, an array of the objects is returned instead.
     * @since 1.0.0
     */
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

    /**
     * FuelBlade IoC injection of container.
     * @param Packfire\FuelBlade\Container $container The container for dependencies to be injected.
     * @since 1.0.0
     * @internal
     */
    public function __invoke($container)
    {
        $this->container = $container;
    }
}
