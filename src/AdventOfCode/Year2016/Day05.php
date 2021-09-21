<?php

namespace App\AdventOfCode\Year2016;

use App\AdventOfCode\AdventOfCode;
use App\Input\DefaultInput;

class Day05 extends AdventOfCode
{
    public function part1(DefaultInput $input): string
    {
        $output = '';
        $i = 0;
        while (strlen($output) < 8) {
            $hash = md5(sprintf('%s%d', $input->getRawInput(), $i));
            if (str_starts_with($hash, '00000')) {
                $output .= $hash[5];
            }

            $i++;
        }
        return $output;
    }

    public function part2(DefaultInput $input): string
    {
        $output = '';
        $parts = array_fill(0, 8, '');
        $i = 0;
        $found = 0;
        while ($found <= 7) {
            $hash = md5(sprintf('%s%d', $input->getRawInput(), $i));
            if (str_starts_with($hash, '00000') && is_numeric($hash[5])) {
                $pos = (int)$hash[5];
                $chr = $hash[6];

                if(isset($parts[$pos]) && $parts[$pos] === '') {
                    $parts[$pos] = $chr;
                    $found++;
                }

            }

            $i++;
        }

        return implode('', $parts);
    }

}

