<?php namespace Samsui\Generator\Provider;

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
        $nameparts = explode('.', $name);
        $filename = array_shift($nameparts);
        $file = __DIR__ . '/Resource/' . $this->locale . '/' . $filename . '.json';
        if (is_file($file)) {
            $data = json_decode(file_get_contents($file), true);
            $lists = isset($data['lists']) ? $data['lists'] : array();
            foreach ($nameparts as $part) {
                if (isset($data['parts']) && isset($data['parts'][$part])) {
                    $data = $data['parts'][$part];
                } else {
                    $data = null;
                    break;
                }
            }
            if (is_array($data)) {
                $data['lists'] = $lists;
            }
            return $data;
        }
    }
}
