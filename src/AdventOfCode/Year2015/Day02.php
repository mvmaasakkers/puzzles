<?php

namespace Puzzles\AdventOfCode\Year2015;

use Puzzles\AdventOfCode\AdventOfCode;
use Puzzles\AdventOfCode\DefaultInput;

class Day02 extends AdventOfCode
{
    public function part1(DefaultInput $input): int
    {
        $wrappingPaper = array_map(static function (string $line) {
            [$l, $w, $h] = explode('x', $line);
            $sides = [$l * $w, $w * $h, $h * $l];
            return (2 * $sides[0]) + (2 * $sides[1]) + (2 * $sides[2]) + min($sides);
        }, $input->getSplitTrimLines());

        return array_sum($wrappingPaper);
    }

    public function part2(DefaultInput $input): int
    {
        $ribbons = array_map(static function (string $line) {
            $sides = explode('x', $line);
            sort($sides);
            return array_product($sides) + (2 * $sides[0]) + (2 * $sides[1]);
        }, $input->getSplitTrimLines());

        return array_sum($ribbons);
    }
}
