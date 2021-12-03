<?php

declare(strict_types=1);

namespace App\AdventOfCode\Year2015;

use App\AdventOfCode\AdventOfCode;
use App\Input\DefaultInput;

class Day23 extends AdventOfCode
{
    public function part1(DefaultInput $input): int
    {
        $data = $this->parseInput($input);
        return $this->run($data, 0);
    }

    public function part2(DefaultInput $input): int
    {
        $data = $this->parseInput($input);
        return $this->run($data, 1);
    }

    private function run($data, $a = 0)
    {
        $registers = [
            'a' => $a,
            'b' => 0
        ];

        $instructionPointer = 0;
        while (true) {
            if (!isset($data[$instructionPointer])) {
                break;
            }
            $d = $data[$instructionPointer];


            switch ($d['in']) {
                case 'hlf':
                    $registers[$d['reg']] = abs($registers[$d['reg']] / 2);
                    $instructionPointer++;
                    break;
                case 'tpl':
                    $registers[$d['reg']] = abs($registers[$d['reg']] * 3);
                    $instructionPointer++;
                    break;
                case 'inc':
                    $registers[$d['reg']] = abs($registers[$d['reg']] + 1);
                    $instructionPointer++;
                    break;
                case 'jmp':
                    $instructionPointer += $d['offset'];
                    break;
                case 'jie':
                    if ($registers[$d['reg']] % 2 === 0) {
                        $instructionPointer += $d['offset'];
                    } else {
                        $instructionPointer++;
                    }
                    break;
                case 'jio':
                    if ($registers[$d['reg']] === 1) {
                        $instructionPointer += $d['offset'];
                    } else {
                        $instructionPointer++;
                    }
                    break;
            }
        }


        return $registers['b'];
    }

    private function parseInput(DefaultInput $input): array
    {
        $output = array_map(static function (string $val) {
            if (str_contains($val, ', ')) {
                $parts = explode(', ', $val);
                sscanf($parts[0], '%s %s', $instruction, $register);
                return ['in' => $instruction, 'reg' => $register, 'offset' => (int)$parts[1]];
            }

            sscanf($val, '%s %s', $instruction, $p2);
            if (is_numeric($p2)) {
                return ['in' => $instruction, 'reg' => '', 'offset' => (int)$p2];
            }
            return ['in' => $instruction, 'reg' => $p2, 'offset' => 0];
        }, $input->getSplitTrimLines());

        return $output;
    }
}

