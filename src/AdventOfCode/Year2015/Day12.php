<?php

namespace App\AdventOfCode\Year2015;

use App\AdventOfCode\AdventOfCode;
use App\Input\DefaultInput;
use App\Helpers\IsAssocArray;

class Day12 extends AdventOfCode
{
    public function part1(DefaultInput $input): int
    {
        preg_match_all('/([\-]?)(\d+)/', $input->getRawInput(), $matches);
        if (empty($matches[0])) {
            return 0;
        }

        return array_sum(array_map(static function (int $value) {
            return $value;
        }, $matches[0]));
    }

    public function part2(DefaultInput $input): int
    {
        $recurse = function (array $array, string $prefix = '') use (&$recurse): array|string {
            $result = array();

            if ((new IsAssocArray())($array) && in_array('red', array_values($array), true)) {
                return $result;
            }

            foreach ($array as $key => $value) {
                $newKey = $prefix . (empty($prefix) ? '' : '.') . $key;
                if (is_array($value)) {
                    $result = array_merge($result, $recurse($value, $newKey));
                } else {
                    if (is_numeric($value)) {
                        $result[$newKey] = $value;
                    }

                }
            }

            return $result;
        };

        return array_sum($recurse(json_decode($input->getRawInput(), true)));
    }

}
