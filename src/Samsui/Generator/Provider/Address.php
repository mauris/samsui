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
}
