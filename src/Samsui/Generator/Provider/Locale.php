<?php

namespace Samsui\Generator\Provider;

class Locale extends BaseProvider
{
    protected $locale;

    public function setLocale($locale)
    {
        $this->locale = $locale;
    }

    public function getLocale()
    {
        return $this->locale;
    }

    public function fetch($name)
    {
        $file = __DIR__ . '/Resource/' . $this->locale . '/' . $name . '.json';
        if (is_file($file)) {
            return json_decode(file_get_contents($file), true);
        }
    }
}
