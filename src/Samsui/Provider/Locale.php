<?php namespace Samsui\Provider;

use Samsui\Resource\Fetcher;

class Locale extends BaseProvider
{
    protected $locale;

    /**
     * @param string $locale
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;
    }

    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * @param string $name
     */
    public function fetch($name)
    {
        $fetcher = new Fetcher();
        return $fetcher->fetch($this->locale . '.' . $name);
    }
}
