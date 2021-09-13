<?php

namespace App\AdventOfCode\Year2015;

use App\AdventOfCode\AdventOfCode;
use App\Input\DefaultInput;
use App\Input\InputInterface;

class Day17 extends AdventOfCode
{
    private function countCombinations(array $data, $total, array &$counts, $num = 1): void
    {
        while (count($data) > 0) {
            $remaining = $total - array_shift($data);
            if ($remaining > 0) {
                $this->countCombinations($data, $remaining, $counts, $num + 1);
            } elseif ($remaining === 0) {
                $counts[$num]++;
            }

        }
    }

    public function part1(DefaultInput|InputInterface $input): mixed
    {
        $containers = $this->parseInput($input);
        $eggnog = $input->getOptions()['eggnog'];

        $orders = array_fill(0, count($containers) - 1, 0);
        $this->countCombinations($containers, $eggnog, $orders);

        return array_sum($orders);
    }

    public function part2(DefaultInput|InputInterface $input): mixed
    {
        $containers = $this->parseInput($input);
        $eggnog = $input->getOptions()['eggnog'];

        $orders = array_fill(0, count($containers) - 1, 0);
        $this->countCombinations($containers, $eggnog, $orders);
        foreach ($orders as $order) {
            if ($order > 0) {
                return $order;
            }
        }
        return 0;
    }

    private function parseInput(DefaultInput|InputInterface $input)
    {
        return array_map(static function ($line) {
            return (int)$line;
        }, $input->getSplitTrimLines());
    }
}

