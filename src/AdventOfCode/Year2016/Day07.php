<?php

declare(strict_types=1);

namespace App\AdventOfCode\Year2016;

use App\AdventOfCode\AdventOfCode;
use App\Input\DefaultInput;

class Day07 extends AdventOfCode
{
    public function part1(DefaultInput $input): int
    {
        $data = $this->parseInput($input);
        $output = 0;

        foreach ($data as $line) {
            if (preg_match('/(.)((?!\1).)(\2)(\1)/', $line) && !preg_match('/\[[^\]]*?(.)((?!\1).)(\2)(\1)[^\]]*?\]/',
                    $line)) {
                $output++;
            }
        }

        return $output;
    }

    public function part2(DefaultInput $input): int
    {
        $data = $this->parseInput($input);
        $output = 0;


        foreach ($data as $line) {
            if (preg_match('/(?![^\[]*])(.)((?!\1).)(\1).*\[[^\]]*?\2\1\2[^\]]*?\]/', $line) && !preg_match('/\[[^\]]*?(.)((?!\1).)(\1)[^\]]*?\].*(?![^\[]*])\2\1\2/',
                    $line)) {
                $output++;
            }
        }


        return $output;
    }

    private function parseInput(DefaultInput $input): array
    {
        $output = $input->getSplitTrimLines();

        return $output;
    }
}

