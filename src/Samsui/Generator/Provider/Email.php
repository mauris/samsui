<?php namespace Samsui\Generator\Provider;

class Email extends BaseProvider
{
    public function domain()
    {
        $data = json_decode(file_get_contents(__DIR__ . '/Resource/domain-names.json'), true);
        $name = $this->generator->math->randomArrayValue($data['email']);
        return $name;
    }
}
