<?php namespace Samsui\Resource;

use Samsui\Generator\GeneratorInterface;

class Loader
{
    protected $generator;

    public function __construct(GeneratorInterface $generator)
    {
        $this->generator = $generator;
    }

    public function load($resource, $lists = array())
    {
        if (is_array($resource)) {
            if (isset($resource['lists'])) {
                $lists = array_merge($lists, $resource['lists']);
                unset($resource['lists']);
            }

            if (isset($resource['provider'])) {
                $provider = $resource['provider'];
                $method = $resource['method'];
                $args = isset($resource['args']) ? $resource['args'] : array();
                $result = call_user_func_array(array($this->generator->$provider, $method), $args);
                return $result;
            } elseif (isset($resource['weighted'])) {
                return $this->generator->math->randomWeightedArray($lists[$resource['weighted']]);
            } elseif (isset($resource['list'])) {
                return $this->generator->math->randomArrayValue($lists[$resource['list']]);
            } else {
                $template = $resource['template'];
                $parts = $resource['parts'];
                return $this->renderTemplate($template, $parts, $lists);
            }
        } else {
            return $resource;
        }
    }

    protected function renderTemplate($template, $parts, $lists)
    {
        $data = array();
        foreach ($parts as $name => $part) {
            $name = '{' . $name . '}';
            $data[$name] = $this->load($part, $lists);
        }
        return str_replace(array_keys($data), $data, $template);
    }
}
