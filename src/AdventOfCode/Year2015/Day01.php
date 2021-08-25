<?php

namespace Puzzles\AdventOfCode\Year2015;

use Puzzles\AdventOfCode\AdventOfCode;
use Puzzles\AdventOfCode\DefaultInput;

class Day01 extends AdventOfCode
{
    public function part1(DefaultInput $input): mixed
    {
        return substr_count($input->getRawInput(), '(') - substr_count($input->getRawInput(), ')');
    }

    public function part2(DefaultInput $input): mixed
    {
        $rawInput = $input->getRawInput();
        $floor = 0;
        for ($pos = 0; $pos < $input->getRawInputLenght(); $pos++) {
            switch ($rawInput[$pos]) {
                case '(':
                    $floor++;
                    break;
                case ')':
                    $floor--;
                    break;
            }

            if ($floor < 0) {
                return $pos + 1;
            }
        }

        return -1;
    }
}
