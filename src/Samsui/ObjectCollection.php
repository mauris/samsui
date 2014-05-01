<?php namespace Samsui;

class ObjectCollection
{
    protected $items = array();

    /**
     * @param string $name
     */
    public function set($name, $object)
    {
        $this->items[$name] = $object;
    }

    /**
     * @param string $name
     */
    public function get($name)
    {
        if (isset($this->items[$name])) {
            return $this->items[$name];
        }
    }
}
