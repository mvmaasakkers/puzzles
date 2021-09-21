<?php

namespace App\AdventOfCode\Year2016;

use App\AdventOfCode\AdventOfCode;
use App\Input\DefaultInput;

class Day06 extends AdventOfCode
{
    public function part1(DefaultInput $input): mixed
    {
        $alf = str_split('abcdefghijklmnopqrstuvwxyz');

        $data = $this->parseInput($input);
        $output = '';

        foreach ($data as $line) {
            $letters = [];
            foreach ($alf as $letter) {
                $c = 0;
                foreach ($line as $part) {
                    if ($part === $letter) {
                        $c++;
                    }
                }
                $letters[$letter] = $c;

            }

            uasort($letters, function ($a, $b) {
                if ($a === $b) {
                    return 0;
                }
                return ($a < $b) ? -1 : 1;
            });

            $output.= array_keys(array_reverse($letters, true))[0];
        }


        return $output;
    }

    public function part2(DefaultInput $input): mixed
    {
        $alf = str_split('abcdefghijklmnopqrstuvwxyz');

        $data = $this->parseInput($input);
        $output = '';

        foreach ($data as $line) {
            $letters = [];
            foreach ($alf as $letter) {
                $c = 0;
                foreach ($line as $part) {
                    if ($part === $letter) {
                        $c++;
                    }
                }
                $letters[$letter] = $c;

            }

            uasort($letters, function ($a, $b) {
                if ($a === $b) {
                    return 0;
                }
                return ($a < $b) ? -1 : 1;
            });

            $letters = array_filter($letters, static function ($value) {
                return $value > 0;
            });

            $output.= array_keys($letters)[0];
        }


        return $output;
    }

    private function parseInput(DefaultInput $input): array
    {
        $output = [];

        foreach ($input->getSplitTrimLines() as $line) {
            $parts = str_split($line);
            foreach ($parts as $i => $v) {
                $output[$i][] = $v;
            }

        }

        return $output;
    }
}

