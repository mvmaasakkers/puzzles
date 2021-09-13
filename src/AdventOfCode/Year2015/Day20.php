<?php

namespace App\AdventOfCode\Year2015;

use App\AdventOfCode\AdventOfCode;
use App\Input\DefaultInput;
use App\Input\InputInterface;
use App\Input\IntInput;

class Day20 extends AdventOfCode
{
    public function part1(IntInput|InputInterface $input): int
    {
        $goal = $input->getRawInput() / 10;
        $houseNumber = 0;
        do {
            $sum = 0;
            $sqrt = @sqrt(++$houseNumber);
            for ($x = 1; $x <= $sqrt; $x++) {
                if (!($houseNumber % $x)) {
                    $sum += ($x !== $sqrt) ? $houseNumber / $x + $x : $x;
                }
            }
        } while ($sum < $goal);
        return $houseNumber;
    }

    public function part2(DefaultInput|InputInterface $input): int
    {
        $goal = ceil($input->getRawInput() / 11);
        $houseNumber = 0;
        do {
            $sum = 0;
            $sqrt = @sqrt(++$houseNumber);
            for ($x = 1; $x <= $sqrt; $x++) {
                if (!($houseNumber % $x)) {
                    $sum += (($houseNumber < 50 * $x) ? $x : 0) + (($x !== $sqrt and $houseNumber < 50 * $houseNumber / $x) ? $houseNumber / $x : 0);
                }
            }
        } while ($sum < $goal);

        return $houseNumber;
    }
}

