<?php namespace Samsui\Provider;

use Samsui\Resource\Fetcher;

class Email extends BaseProvider
{
    public function domain()
    {
        $fetcher = new Fetcher();
        $data = $fetcher->fetch('email.lists.domains');
        $name = $this->generator->math->randomArrayValue($data);
        return $name;
    }
}
