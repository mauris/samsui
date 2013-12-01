<?php

namespace Samsui\Generator\Provider;

use Samsui\Generator\Provider\Resource\Loader as ResourceLoader;

class Address extends BaseProvider
{
    public function random()
    {
        $resource = $this->generator->locale->fetch('address');
        $lists = isset($resource['lists']) ? $resource['lists'] : array();
        unset($resource['lists']);
        $loader = new ResourceLoader($this->generator);
        return $loader->load($resource, $lists);
    }

    public function postal()
    {
        $resource = $this->generator->locale->fetch('address.postal');
        $lists = isset($resource['lists']) ? $resource['lists'] : array();
        unset($resource['lists']);
        $loader = new ResourceLoader($this->generator);
        return $loader->load($resource, $lists);
    }

    public function street()
    {
        $resource = $this->generator->locale->fetch('address.street');
        $lists = isset($resource['lists']) ? $resource['lists'] : array();
        unset($resource['lists']);
        $loader = new ResourceLoader($this->generator);
        return $loader->load($resource, $lists);
    }

    public function unit()
    {
        $resource = $this->generator->locale->fetch('address.unit');
        $lists = isset($resource['lists']) ? $resource['lists'] : array();
        unset($resource['lists']);
        $loader = new ResourceLoader($this->generator);
        return $loader->load($resource, $lists);
    }

    public function country()
    {
        $resource = $this->generator->locale->fetch('address.country');
        $lists = array();
        if (is_array($resource) && isset($resource['lists'])) {
            $lists = $resource['lists'];
            unset($resource['lists']);
        }
        $loader = new ResourceLoader($this->generator);
        return $loader->load($resource, $lists);
    }
}
