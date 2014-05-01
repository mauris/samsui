<?php namespace Samsui\Generator;

use Samsui\Generator\Provider\ProviderInterface;

class Generator implements GeneratorInterface
{
    protected $providers = array();

    protected static $instance;

    /**
     * @param string $name
     */
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

    public static function instance()
    {
        return self::$instance;
    }

    public static function __callStatic($method, $args)
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance->$method;
    }
}
