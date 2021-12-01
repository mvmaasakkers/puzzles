<?php

declare(strict_types=1);

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
                array_sum(array_slice($data, $k, 3)) < array_sum(array_slice($data, $k + 1, 3))
            );
        }, ARRAY_FILTER_USE_BOTH));
    }

    private function parseInput(DefaultInput $input): array
    {
        return $input->getSplitTrimLinesAsInt();
    }
}

