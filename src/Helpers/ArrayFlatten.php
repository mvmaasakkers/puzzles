<?php

namespace Puzzles\Helpers;

class ArrayFlatten
{
    public function __invoke(array $array)
    {
        return $this->flatten($array);
    }

    private function flatten($array, $prefix = ''): array|string
    {
        $result = array();

        foreach ($array as $key => $value) {
            $new_key = $prefix . (empty($prefix) ? '' : '.') . $key;

            if (is_array($value)) {
                $result = array_merge($result, $this->flatten($value, $new_key));
            } else {
                $result[$new_key] = $value;
            }
        }

        return $result;
    }
}
