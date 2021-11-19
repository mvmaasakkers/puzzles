<?php

namespace App\AdventOfCode\Year2019;

use App\AdventOfCode\AdventOfCode;
use App\Input\DefaultInput;

class Day02 extends AdventOfCode
{
    public function part1(DefaultInput $input): mixed
    {
        $instructions = $this->parseInput($input);

        $intcode = new IntCode($instructions);
        $intcode->setValue(1, 12);
        $intcode->setValue(2, 2);
        $intcode->run();

        return $intcode->getValue(0);
    }

    public function part2(DefaultInput $input): mixed
    {
        $instructions = $this->parseInput($input);
        $checkForOutput = 19690720;

        for($i = 0; $i < 100; $i++) {
            for ($j = 0; $j < 100; $j++) {
                $intcode = new IntCode($instructions);
                $intcode->setValue(1, $i);
                $intcode->setValue(2, $j);
                $intcode->run();

                if($intcode->getValue(0) === $checkForOutput) {
                    return (100 * $i) + $j;
                }
            }
        }

        return 0;
    }

    private function parseInput(DefaultInput $input): array
    {
        return array_map(static fn($value) => (int)$value, explode(',', trim($input->getRawInput())));
    }
}

