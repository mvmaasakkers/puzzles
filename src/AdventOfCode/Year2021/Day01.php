<?php

namespace App\AdventOfCode\Year2021;

use App\AdventOfCode\AdventOfCode;
use App\Input\DefaultInput;

class Day01 extends AdventOfCode
{
    public function part1(DefaultInput $input): int
    {
        $data = $this->parseInput($input);

        return count(array_filter($data, static function ($v, $k) use ($data) {
            return (isset($data[$k - 1]) && $v > $data[$k - 1]);
        }, ARRAY_FILTER_USE_BOTH));
    }

    public function part2(DefaultInput $input): int
    {
        $data = $this->parseInput($input);

        return count(array_filter($data, static function ($v, $k) use ($data) {
            return (
                isset($data[$k + 3]) &&
                $data[$k] + $data[$k + 1] + $data[$k + 2] < $data[$k + 1] + $data[$k + 2] + $data[$k + 3]
            );
        }, ARRAY_FILTER_USE_BOTH));
    }

    private function parseInput(DefaultInput $input): array
    {
        return array_map(static function (string $v) {
            return (int)$v;
        }, $input->getSplitTrimLines());
    }
}

