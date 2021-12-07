<?php

declare(strict_types=1);

namespace App\AdventOfCode\Year2021;

use App\AdventOfCode\AdventOfCode;
use App\Input\DefaultInput;

class Day07 extends AdventOfCode
{
    public function part1(DefaultInput $input): int
    {
        $data = array_map(static fn($value) => (int)$value, explode(',', trim($input->getRawInput())));
        $minFuel = PHP_INT_MAX;
        for ($i = 1, $iMax = count($data); $i < $iMax; $i++) {
            $fuel = array_sum(array_map(static fn($v) => abs($v - $i), $data));

            if ($fuel < $minFuel) {
                $minFuel = $fuel;
            }
        }

        return $minFuel;
    }

    public function part2(DefaultInput $input): int
    {
        $data = array_map(static fn($value) => (int)$value, explode(',', trim($input->getRawInput())));
        $minFuel = PHP_INT_MAX;
        for ($i = 1, $iMax = count($data); $i < $iMax; $i++) {
            $fuel = array_sum(array_map(static function ($v) use ($i) {
                $diff = abs($v - $i);
                return $diff * ($diff + 1) / 2;
            }, $data));

            if ($fuel < $minFuel) {
                $minFuel = $fuel;
            }
        }

        return $minFuel;
    }
}

