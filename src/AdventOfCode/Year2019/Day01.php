<?php

namespace App\AdventOfCode\Year2019;

use App\AdventOfCode\AdventOfCode;
use App\Input\DefaultInput;

class Day01 extends AdventOfCode
{
    public function part1(DefaultInput $input): int
    {
        $data = $this->parseInput($input);
        return array_sum(array_map(static function (int $value) {
            return (int)(floor($value / 3) - 2);
        }, $data));
    }

    public function part2(DefaultInput $input): int
    {
        $data = $this->parseInput($input);

        return array_sum(array_map(static function (int $line) {
            $fuel = (int)(floor($line / 3) - 2);
            $totalFuel = 0;
            while($fuel > 0) {
                $totalFuel += $fuel;
                $fuel = (int)(floor($fuel / 3) - 2);
            }
            return $totalFuel;
        }, $data));
    }

    private function parseInput(DefaultInput $input): array
    {
        return array_map(static function ($value) {
            return (int)$value;
        }, $input->getSplitTrimLines());
    }
}

