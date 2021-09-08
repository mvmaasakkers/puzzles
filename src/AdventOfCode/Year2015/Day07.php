<?php

namespace App\AdventOfCode\Year2015;

use App\AdventOfCode\AdventOfCode;
use App\AdventOfCode\DefaultInput;

class Day07 extends AdventOfCode
{
    private array $wires = [];
    private array $op = array('AND' => '&', 'OR' => '|', 'NOT' => '~', 'RSHIFT' => '>>', 'LSHIFT' => '<<');

    private function calculate($w)
    {
        if (!isset($this->wires[$w])) {
            return $w;
        }

        if (str_contains($this->wires[$w], ' ')) {
            eval('$this->wires[$w] = (' . preg_replace_callback('#(([a-z0-9]+) )?([A-Z]+) ([a-z0-9]+)#', function ($p) {
                    return $this->calculate($p[2]) . $this->op[$p[3]] . $this->calculate($p[4]);
                }, $this->wires[$w]) . ' & 65535);');
        }

        return $this->calculate($this->wires[$w]);
    }

    public function part1(DefaultInput $input): mixed
    {
        $lines = $input->getSplitTrimLines();
        foreach ($lines as $line) {
            [$k, $v] = explode(' -> ', $line);
            $this->wires[$v] = $k;
        }

        return $this->calculate('a');
    }

    public function part2(DefaultInput $input): mixed
    {
        $lines = $input->getSplitTrimLines();
        foreach ($lines as $line) {
            [$k, $v] = explode(' -> ', $line);
            $this->wires[$v] = $k;
        }

        $this->wires['b'] = 46065;
        return $this->calculate('a');
    }
}
