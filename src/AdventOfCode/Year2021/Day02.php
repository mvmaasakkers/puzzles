<?php

declare(strict_types=1);

namespace App\AdventOfCode\Year2021;

use App\AdventOfCode\AdventOfCode;
use App\Input\DefaultInput;

class Day02 extends AdventOfCode
{
    public function part1(DefaultInput $input): int
    {
        $data = $this->parseInput($input);

        $depth = 0;
        $hor = 0;

        foreach ($data as $line) {
            switch ($line[0]) {
                case "forward":
                    $hor += $line[1];
                    break;
                case "down":
                    $depth += $line[1];
                    break;
                case "up":
                    $depth -= $line[1];
                    break;
            }
        }


        return $depth * $hor;
    }

    public function part2(DefaultInput $input): int
    {
        $data = $this->parseInput($input);

        $depth = 0;
        $hor = 0;
        $aim = 0;

        foreach ($data as $line) {
            switch ($line[0]) {
                case "forward":
                    $hor += $line[1];
                    $depth += ($line[1] * $aim);
                    break;
                case "down":
                    $aim += $line[1];
                    break;
                case "up":
                    $aim -= $line[1];
                    break;
            }
        }

        return $depth * $hor;
    }

    private function parseInput(DefaultInput $input): array
    {
        return array_map(static function (string $v): array {
            $p = explode(' ', $v);
            return [$p[0], (int)$p[1]];
        }, $input->getSplitTrimLines());
    }
}

