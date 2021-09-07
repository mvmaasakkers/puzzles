<?php

namespace Puzzles\AdventOfCode\Year2015;

use Puzzles\AdventOfCode\AdventOfCode;
use Puzzles\Helpers\ComputePermutations;
use Puzzles\AdventOfCode\DefaultInput;

class Day09 extends AdventOfCode
{
    public function part1(DefaultInput $input): int
    {
        return min($this->getDistances($input));
    }

    public function part2(DefaultInput $input): int
    {
        return max($this->getDistances($input));
    }


    private function getDistances(DefaultInput $input): array {
        $distances = [];
        $destinations = [];

        foreach ($input->getSplitTrimLines() as $line) {
            sscanf($line, '%s to %s = %d', $from, $to, $distance);
            $distances[$from][$to] = $distance;
            $distances[$to][$from] = $distance;

            if (!in_array($from, $destinations, true)) {
                $destinations[] = $from;
            }
            if (!in_array($to, $destinations, true)) {
                $destinations[] = $to;
            }
        }

        $calculatedDistances = [];

        foreach ((new ComputePermutations())($destinations) as $permutation) {
            $len = count($permutation);
            $calculatedDistances[implode('->', $permutation)] = 0;
            for($i = 1; $i < $len; $i++) {
                $calculatedDistances[implode('->', $permutation)] += $distances[$permutation[$i-1]][$permutation[$i]];
            }
        }

        return $calculatedDistances;
    }
}
