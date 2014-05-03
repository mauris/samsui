<?php namespace Samsui\Resource;

class Fetcher implements FetcherInterface
{
    /**
     * Fetch the resource based on a dot-notation path
     * @param  string $path The path to the resource
     * @return array|null       Returns the resource fetched, or null if not found.
     */
    public function fetch($path)
    {
        $parts = explode('.', $path);

        $dir = realpath(__DIR__ . '/../../../data');
        $filename = $dir . '/' . array_shift($parts);
        while (is_dir($filename)) {
            $filename .= '/' . array_shift($parts);
        }
        $filename .= '.json';
        if (is_file($filename)) {
            $data = json_decode(file_get_contents($filename), true);
            $lists = isset($data['lists']) ? $data['lists'] : array();
            return self::find($data, $lists, $parts);
        }
    }

    protected static function find($data, $lists, $parts)
    {
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
