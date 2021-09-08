<?php

namespace App\Helpers;

class ComputePermutations
{
    /**
     * @param $array
     * @return array
     */
    public function __invoke($array): array
    {
        $result = [];

        $recurse = static function ($array, $start_i = 0) use (&$result, &$recurse) {
            if ($start_i === count($array) - 1) {
                $result[] = $array;
            }

            for ($i = $start_i, $iMax = count($array); $i < $iMax; $i++) {
                //Swap array value at $i and $start_i
                $t = $array[$i];
                $array[$i] = $array[$start_i];
                $array[$start_i] = $t;

                //Recurse
                $recurse($array, $start_i + 1);

                //Restore old order
                $t = $array[$i];
                $array[$i] = $array[$start_i];
                $array[$start_i] = $t;
            }
        };

        $recurse($array);

        return $result;
    }
}
