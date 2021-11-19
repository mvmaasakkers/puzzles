<?php

namespace App\AdventOfCode\Year2019;

use App\AdventOfCode\AdventOfCode;
use App\Input\DefaultInput;

class Day05 extends AdventOfCode
{
    public function part1(DefaultInput $input, int $inputVar): mixed
    {
        $instructions = $input->getIntCodeInput();

        $intcode = new IntCode($instructions);
        $intcode->setInput($inputVar);
        $intcode->run();

        return $intcode->getOutput()[0];
    }

    public function part2(DefaultInput $input): mixed
    {
        $instructions = $input->getIntCodeInput();
        $output = 0;

        return $output;
    }

    private function parseInput(DefaultInput $input): array
    {
        $output = [];

        return $output;
    }
}

