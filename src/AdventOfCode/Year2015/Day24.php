<?php

declare(strict_types=1);

namespace App\AdventOfCode\Year2015;

use App\AdventOfCode\AdventOfCode;
use App\Input\DefaultInput;

class Day24 extends AdventOfCode
{
    public function part1(DefaultInput $input): int
    {
        return $this->calculate($input->getSplitTrimLinesAsInt(), 3);
    }

    public function part2(DefaultInput $input): int
    {
        return $this->calculate($input->getSplitTrimLinesAsInt(), 4);
    }

    private array $input;
    private int $avgweight = 0;
    private float $min = PHP_INT_MAX;
    private float $minqe = PHP_INT_MAX;

    function pick($i, $left, $len = 0, $sum = 0, $prod = 1)
    {
        if ($sum === $this->avgweight) {
            if ($len < $this->min) {
                $this->min = $len;
                $this->minqe = $prod;
            } else {
                if ($len === $this->min) {
                    $this->minqe = min($this->minqe, $prod);
                }
            }
            return;
        }
        if ($len > $this->min || $sum > $this->avgweight || $left === 0 || $i >= count($this->input)) {
            return;
        }

        $this->pick($i + 1, $left - 1, $len + 1, $sum + $this->input[$i], $prod * $this->input[$i]);
        $this->pick($i + 1, $left, $len, $sum, $prod);
    }

    private function calculate($input, $size)
    {
        $this->input = $input;
        $this->avgweight = array_sum($this->input) / $size;
        $this->pick(0, floor(count($this->input) / $size));

        return (int)$this->minqe;
    }
}

