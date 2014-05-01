<?php namespace Samsui;

class ObjectCollection
{
    protected $items = array();

    /**
     * Set an object to its corresponding name in the collection
     * @param string $name The name of the object to set
     * @param mixed $object The object to store in the collection
     */
    public function set($name, $object)
    {
        $this->items[$name] = $object;
    }

    /**
     * Retrieve an object stored in the collection
     * @param string $name Name of the object to retrieve
     * @return mixed Returns the object in the collection.
     */
    public function get($name)
    {
        if (isset($this->items[$name])) {
            return $this->items[$name];
        }
    }
}
