<?php

namespace App\AdventOfCode\Year2015;

use App\AdventOfCode\AdventOfCode;
use App\AdventOfCode\DefaultInput;

class Day10 extends AdventOfCode
{
    public function part1(DefaultInput $input, int $iterations = 1): int
    {
        $output = $input->getRawInput();
        for($i = 0; $i < $iterations; $i++) {
            $output = $this->iterate($output);
        }

        return strlen($output);
    }

    private function iterate($input) {
        $characters = str_split($input);
        $output = '';
        $chars = [];
        $lastChar = $characters[0];
        $counter = 0;
        foreach ($characters as $character) {
            if ($character === $lastChar) {
                $counter++;
                $lastChar = $character;
                continue;
            }
            $output .= $counter . $lastChar;
            $lastChar = $character;
            $counter = 1;
        }

        return $output.$counter.$lastChar;
    }
    public function part2(DefaultInput $input, int $iterations = 1): int
    {
        $output = $input->getRawInput();
        for($i = 0; $i < $iterations; $i++) {
            $output = $this->iterate($output);
        }

        return strlen($output);
    }
}
