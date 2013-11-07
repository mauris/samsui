<?php

namespace Samsui\Generator;

use Samsui\Generator\Provider\ProviderInterface;

class Generator implements GeneratorInterface
{
    protected $providers = array();

    public function registerProvider($name, ProviderInterface $provider)
    {
        $this->providers[$name] = $provider;
    }

    public function __get($name)
    {
        if (isset($this->providers[$name])) {
            return $this->providers[$name];
        }
    }
}
