<?php

namespace Samsui\Generator\Provider\Resource;

use Samsui\Generator\GeneratorInterface;

class Loader
{
    protected $generator;

    public function __construct(GeneratorInterface $generator)
    {
        $this->generator = $generator;
    }

    public function load($resource)
    {
        $template = $resource['template'];
        $parts = $resource['parts'];
        $lists = $resource['lists'];

        $data = array();
        foreach ($parts as $name => $part) {
            $name = '{' . $name . '}';
            if (isset($part['provider'])) {
                $provider = $part['provider'];
                $method = $part['method'];
                $args = isset($part['args']) ? $part['args'] : array();
                $data[$name] = call_user_func_array(array($this->generator->$provider, $method), $args);
            } elseif (isset($part['list'])) {
                $data[$name] = $this->generator->math->randomArrayValue($lists[$part['list']]);
            } else {
                $part['lists'] = $lists;
                $data[$name] = $this->load($part);
            }
        }
        return str_replace(array_keys($data), $data, $template);
    }
}
