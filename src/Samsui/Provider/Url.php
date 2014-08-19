<?php namespace Samsui\Provider;

use Samsui\Resource\Loader as ResourceLoader;
use Samsui\Resource\Fetcher;

class Url extends BaseProvider
{
    /**
     * @return string
     */
    public function tld()
    {
        $fetcher = new Fetcher();
        $data = $fetcher->fetch('urls.lists.domainTLD');
        $tld = $this->generator->math->randomWeightedArray($data);
        return $tld;
    }

    public function commonDomain()
    {
        $fetcher = new Fetcher();
        $data = $fetcher->fetch('urls.lists.commonNames');
        $name = $this->generator->math->randomArrayValue($data);
        return $name;
    }

    public function domain()
    {
        $fetcher = new Fetcher();
        $resource = $fetcher->fetch('urls.domain');
        $loader = new ResourceLoader($this->generator);
        return $loader->load($resource);
    }

    public function path()
    {
        $fetcher = new Fetcher();
        $parts = $fetcher->fetch('urls.lists.pathParts');
        $path = '';
        if ($parts) {
            $partCount = $this->generator->math->between(2, 4);
            $keys = array_rand($parts, $partCount);
            foreach ($keys as $key) {
                $path .= '/' . $parts[$key];
            }
        }
        return $path;
    }
}
