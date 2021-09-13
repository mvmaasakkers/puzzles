<?php

namespace App\AdventOfCode\Year2015;

use App\AdventOfCode\AdventOfCode;
use App\Helpers\FindAllOccurrencesInString;
use App\Input\DefaultInput;
use App\Input\InputInterface;

class Day19 extends AdventOfCode
{
    public function part1(DefaultInput|InputInterface $input): mixed
    {
        $data = $this->parseInput($input);

        return 0;
    }

    public function part2(DefaultInput|InputInterface $input): mixed
    {
        $data = $this->parseInput($input);

        return 0;
    }

    private function parseInput(DefaultInput|InputInterface $input): array
    {
        $splitParts = explode("\n\n", $input->getRawInput());
        $output = ['replacements' => [], 'calibration' => ''];

        if (count($splitParts) > 1) {
            $output['calibration'] = $splitParts[1];
        }

        foreach (explode("\n", $splitParts[0]) as $r) {
            $lr = explode(' => ', $r);
            $output['replacements'][$lr[0]][] = $lr[1];
        }

        return $output;
    }
}

