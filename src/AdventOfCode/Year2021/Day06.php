<?php

declare(strict_types=1);

namespace App\AdventOfCode\Year2021;

use App\AdventOfCode\AdventOfCode;
use App\Input\DefaultInput;

class Day06 extends AdventOfCode
{
    public function part1(DefaultInput $input): int
    {
        $maxDays = 80;
        $fishes = $this->parseInput($input);

        return $this->sim($fishes, $maxDays);

    }

    private function sim($fishes, $maxDays)
    {
        for ($day = 1; $day <= $maxDays; $day++) {
            foreach ($fishes as $i => $iValue) {
                if ($iValue === 0) {
                    $fishes[] = 8;
                    $fishes[$i] = 6;
                } else {
                    $fishes[$i]--;
                }
            }
        }
        return count($fishes);
    }

    public function part2(DefaultInput $input): int
    {
        $maxDays = 256;
        $fishes = $this->parseInput($input);

        for ($day = 1; $day <= $maxDays; $day++) {
            foreach ($fishes as $i => $iValue) {
                if ($iValue === 0) {
                    $fishes[] = 8;
                    $fishes[$i] = 6;
                } else {
                    $fishes[$i]--;
                }
            }
        }
        return count($fishes);
    }

    private function parseInput(DefaultInput $input): array
    {
        return array_map(static fn($value) => (int)$value, explode(',', trim($input->getRawInput())));
    }
}

