<?php

namespace Samsui\Generator\Provider;

use Samsui\Generator\GeneratorInterface;

interface ProviderInterface
{
    public function __construct(GeneratorInterface $generator);
}
