<?php

declare(strict_types=1);

namespace App\AdventOfCode\Year2015;

use App\AdventOfCode\AdventOfCode;
use App\Input\DefaultInput;

class Day22 extends AdventOfCode
{
    public function part1(DefaultInput $input): int
    {
        $data = $this->parseInput($input);
        $output = 0;

        return $output;
    }

    public function part2(DefaultInput $input): int
    {
        $data = $this->parseInput($input);
        $output = 0;

        return $output;
    }

    private function parseInput(DefaultInput $input): array
    {
        $output = $input->getSplitTrimLines();

        return $output;
    }
}

