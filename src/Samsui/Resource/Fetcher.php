<?php namespace Samsui\Resource;

class Fetcher
{
    private $resourceDir;

    public function __construct()
    {
        $this->resourceDir = realpath(__DIR__ . '/../../../data');
    }

    public function fetch($path)
    {
        $parts = explode('.', $path);
        $filename = $this->resourceDir . '/' . array_shift($parts);
        while (is_dir($filename)) {
            $filename .= '/' . array_shift($parts);
        }
        $filename .= '.json';
        if (is_file($filename)) {
            $data = json_decode(file_get_contents($filename), true);
            $lists = isset($data['lists']) ? $data['lists'] : array();
            if (count($parts) == 2 && $parts[0] == 'lists') {
                $data = $lists[$parts[1]];
            } else {
                foreach ($parts as $part) {
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
            }
            return $data;
        }
    }
}
