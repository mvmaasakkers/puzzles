<?php

namespace App\AdventOfCode\Year2015;

use App\AdventOfCode\AdventOfCode;
use App\Helpers\ComputePermutations;
use App\Input\DefaultInput;

class Day13 extends AdventOfCode
{
    public function part1(DefaultInput $input): int
    {
        $lines = $this->parseInput($input);

        $people = [];
        foreach ($lines as $line) {
            $people[] = $line['name1'];
            $people[] = $line['name2'];
        }
        $people = array_values(array_unique($people));

        return $this->calculate($lines, $people);
    }

    public function part2(DefaultInput $input): int
    {
        $lines = $this->parseInput($input);
        $myName = 'Martijn';
        $people = [];
        foreach ($lines as $line) {
            $people[] = $line['name1'];
            $people[] = $line['name2'];
        }
        $people = array_values(array_unique($people));

        foreach ($people as $person) {
            $lines[] = $this->parseLine(sprintf('%s would gain 0 happiness units by sitting next to %s.', $myName,
                $person));
            $lines[] = $this->parseLine(sprintf('%s would gain 0 happiness units by sitting next to %s.', $person,
                $myName));
        }

        $people[] = $myName;

        return $this->calculate($lines, $people);
    }

    /**
     * @param DefaultInput $input
     * @return array
     */
    private function parseInput(DefaultInput $input): array
    {
        return array_map(function ($line) {
            return $this->parseLine($line);
        }, $input->getSplitTrimLines());
    }

    private function parseLine(string $line): array
    {
        [$name1, $gainLose, $happinessUnits, $name2] = sscanf(substr($line, 0, -1),
            '%s would %s %d happiness units by sitting next to %s.');
        return [
            'name1' => $name1,
            'name2' => $name2,
            'gainLose' => $gainLose,
            'happinessUnits' => $happinessUnits
        ];
    }

    /**
     * @param array $lines
     * @param array $people
     * @return mixed
     */
    private function calculate(array $lines, array $people): mixed
    {
        $points = [];
        foreach ($lines as $line) {
            $points[$line['name1']][$line['name2']] = $line['happinessUnits'];
            if ($line['gainLose'] === 'lose') {
                $points[$line['name1']][$line['name2']] *= -1;
            }
        }

        $permutations = (new ComputePermutations())($people);

        $seatingArrangements = [];
        foreach ($permutations as $permutation) {
            $num = count($permutation);
            $units = 0;
            foreach ($permutation as $i => $person) {
                $left = $i - 1 < 0 ? $num - 1 : $i - 1;
                $right = $i + 1 > $num - 1 ? 0 : $i + 1;

                $units += $points[$person][$permutation[$left]];
                $units += $points[$person][$permutation[$right]];
            }

            $seatingArrangements[] = $units;
        }


        return max($seatingArrangements);
    }
}

