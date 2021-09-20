<?php

namespace App\AdventOfCode\Year2016;

use App\AdventOfCode\AdventOfCode;
use App\Helpers\ShiftCipher;
use App\Input\DefaultInput;

class Day04 extends AdventOfCode
{
    public function part1(DefaultInput $input): mixed
    {
        $alf = str_split('abcdefghijklmnopqrstuvwxyz');
        $data = $this->parseInput($input);
        $output = 0;
        foreach ($data as $line) {
            $parts = str_split($line['name']);
            $letters = array_fill_keys($alf, 0);
            foreach ($alf as $letter) {
                $c = 0;
                foreach ($parts as $part) {
                    if ($part === $letter) {
                        $c++;
                    }
                }
                $letters[$letter] = $c;
            }
            $found = array_filter($letters, static function ($letter) {
                return $letter > 0;
            });

            uasort($found, function ($a, $b) {
                if ($a === $b) {
                    return 0;
                }
                return ($a < $b) ? -1 : 1;
            });

            $found = array_reverse($found, true);

            $list = [];
            foreach ($found as $k => $v) {
                $list[$v][] = $k;
            }

            foreach ($list as $k => $v) {
                sort($list[$k]);
            }

            $checkWithChecksum = '';
            foreach ($list as $letters) {
                foreach ($letters as $letter) {
                    $checkWithChecksum .= $letter;
                }
            }

            if (str_starts_with($checkWithChecksum, $line['checksum'])) {
                $output += $line['sectorId'];
            }
        }

        return $output;
    }


    public function part2(DefaultInput $input): int
    {
        $data = $this->parseInput($input);
        $shiftCipher = new ShiftCipher('abcdefghijklmnopqrstuvwxyz');

        foreach ($data as $line) {
            $shiftCipher->shiftRight($line['sectorId']);
            $decrypted = str_replace('-', ' ', $shiftCipher->translate($line['name']));
            if(str_contains($decrypted, 'northpole')) {
                return $line['sectorId'];
            }
        }

        return 0;
    }

    private function parseInput(DefaultInput $input): array
    {
        $output = array_map(static function ($line) {

            preg_match('/([a-zA-Z\-]*)\-([\d]*)\[([a-z]*)\]/', $line, $matches);

            return [
                'name' => $matches[1],
                'sectorId' => (int)$matches[2],
                'checksum' => $matches[3]
            ];
        }, $input->getSplitTrimLines());

        return $output;
    }
}

