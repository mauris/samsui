<?php

namespace Samsui\Generator\Provider;

class Url extends BaseProvider
{
    public function tld()
    {
        $data = json_decode(file_get_contents(__DIR__ . '/Resource/tld.json'), true);
        $tld = $this->generator->math->randomWeightedArray($data);
        return $tld;
    }
}
