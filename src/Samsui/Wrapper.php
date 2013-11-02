<?php

namespace Samsui;

class Wrapper
{
    protected $properties = array();

    protected $methods = array();

    public function __construct($properties, $methods)
    {
        $this->properties = $properties;
        $this->methods = $methods;
    }

    public function __sleep()
    {
        return array('properties', 'methods');
    }

    public function __wakeup()
    {
    }

    public function __get($name)
    {
        return $this->properties[$name];
    }

    public function __set($name, $value)
    {
        $this->properties[$name] = $value;
    }

    public function __isset($name)
    {
        return isset($this->properties[$name]);
    }

    public function __unset($name)
    {
        unset($this->properties[$name]);
    }

    public function __call($name, $arguments)
    {
        if (isset($this->methods[$name])) {
            return call_user_func_array($this->methods[$name], $arguments);
        }
        throw new \Exception('Tried to call unknown method in Samsui wrapper object "' . $name . '()"');
    }
}
