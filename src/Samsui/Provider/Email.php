<?php namespace Samsui\Provider;

use Samsui\Resource\Fetcher;
use Samsui\Resource\Loader as ResourceLoader;

class Email extends BaseProvider
{
    public function domain()
    {
        $fetcher = new Fetcher();
        $data = $fetcher->fetch('email.lists.domains');
        $name = $this->generator->math->randomArrayValue($data);
        return $name;
    }

    public function address()
    {
        $fetcher = new Fetcher();
        $resource = $fetcher->fetch('email');
        $loader = new ResourceLoader($this->generator);
        return $loader->load($resource);
    }
}
