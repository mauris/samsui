<?php namespace Samsui\Provider;

use Samsui\Resource\Loader as ResourceLoader;

class Telephone extends BaseProvider
{
    public function telephone()
    {
        $resource = $this->generator->locale->fetch('telephone');
        $loader = new ResourceLoader($this->generator);
        return $loader->load($resource);
    }

    public function number()
    {
        $resource = $this->generator->locale->fetch('telephone.number');
        $loader = new ResourceLoader($this->generator);
        return $loader->load($resource);
    }

    public function countryCode()
    {
        $resource = $this->generator->locale->fetch('telephone.country');
        $loader = new ResourceLoader($this->generator);
        return $loader->load($resource);
    }
}
