<?php namespace Samsui;

interface FactoryInterface
{
    /**
     * Define a object build definition
     * @param string $name The identifier of the object to be defined
     * @return Samsui\DefinitionInterface Returns the Definition for building the object
     * @since 1.0.0
     */
    public function define($name);

    /**
     * Build objects using the build definition
     * @param string $name The identifier of the build definition
     * @param int $quantity (optional) The number of objects to build, defaults to 1 only. If the quantity specified is more than 1, an array of objects will be returned instead of just the object.
     * @return mixed|array Returns the resulting object. If the quantity is more than one, an array of the objects is returned instead.
     * @since 1.0.0
     */
    public function build($name, $quantity = 1);
}
