<?php namespace Samsui\Provider;

use Samsui\Generator\GeneratorInterface;

abstract class BaseProvider implements ProviderInterface
{
    protected $generator;

    public function __construct(GeneratorInterface $generator)
    {
        $this->generator = $generator;
    }
}
