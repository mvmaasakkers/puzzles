<?php

namespace App\AdventOfCode\Year2016;

use App\AdventOfCode\AdventOfCode;
use App\Helpers\ComputePermutations;
use App\Input\DefaultInput;

class Day03 extends AdventOfCode
{
    public function part1(DefaultInput $input): mixed
    {
        $lines = array_map(static function ($line) {
            preg_match('/(\d+)\s+(\d+)\s+(\d+)/', $line, $matches);
            array_shift($matches);
            return array_map(static function ($match) {
                return (int)$match;
            }, $matches);
        }, $input->getSplitTrimLines());

        $triangles = [];
        foreach ($lines as $line) {
            if ($this->isValidTriangle($line)) {
                $triangles[] = $line;
            }
        }

        return count($triangles);
    }

    private function isValidTriangle($sides): bool
    {
        if (count($sides) < 3) {
            return false;
        }
        $permutations = (new ComputePermutations())($sides);

        foreach ($permutations as $permutation) {
            if ($permutation[0] + $permutation[1] <= $permutation[2]) {
                return false;
            }
        }

        return true;
    }

    public function part2(DefaultInput $input): int
    {
        $lines = array_map(static function ($line) {
            preg_match('/(\d+)\s+(\d+)\s+(\d+)/', $line, $matches);
            array_shift($matches);
            return array_map(static function ($match) {
                return (int)$match;
            }, $matches);
        }, $input->getSplitTrimLines());

        $combinations = array_merge(
            array_chunk(array_map(static function ($line) {
                return $line[0];
            }, $lines), 3),
            array_chunk(array_map(static function ($line) {
                return $line[1];
            }, $lines), 3),
            array_chunk(array_map(static function ($line) {
                return $line[2];
            }, $lines), 3)
        );

        $triangles = [];
        foreach ($combinations as $line) {
            if ($this->isValidTriangle($line)) {
                $triangles[] = $line;
            }
        }

        return count($triangles);
    }
}

