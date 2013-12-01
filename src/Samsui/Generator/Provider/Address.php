<?php

namespace Samsui\Generator\Provider;

use Samsui\Generator\Provider\Resource\Loader as ResourceLoader;

class Address extends BaseProvider
{
    public function random()
    {
        $resource = $this->generator->locale->fetch('address');
        $loader = new ResourceLoader($this->generator);
        return $loader->load($resource);
    }

    public function postal()
    {
        $resource = $this->generator->locale->fetch('address.postal');
        $loader = new ResourceLoader($this->generator);
        return $loader->load($resource, $lists);
    }

    public function street()
    {
        $resource = $this->generator->locale->fetch('address.street');
        $loader = new ResourceLoader($this->generator);
        return $loader->load($resource, $lists);
    }

    public function unit()
    {
        $resource = $this->generator->locale->fetch('address.unit');
        $loader = new ResourceLoader($this->generator);
        return $loader->load($resource, $lists);
    }

    public function country()
    {
        $resource = $this->generator->locale->fetch('address.country');
        $loader = new ResourceLoader($this->generator);
        return $loader->load($resource, $lists);
    }
}
