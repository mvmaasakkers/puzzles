<?php

namespace App\AdventOfCode\Year2015;

use App\AdventOfCode\AdventOfCode;
use App\AdventOfCode\DefaultInput;
use App\Helpers\Grid2DPosition;

class Day06 extends AdventOfCode
{
    private function prepareData(DefaultInput $input): array
    {
        $data = [];
        $lines = $input->getSplitTrimLines();
        foreach ($lines as $line) {
            preg_match('/^\D*(?=\d)/', $line, $m);
            $fno = strlen($m[0]);
            $d = [];
            $d['command'] = trim(substr($line, 0, $fno));

            [$d['startX'], $d['startY'], $d['endX'], $d['endY']] = sscanf(substr($line, $fno), '%i,%i through %i,%i');

            $data[] = $d;
        }

        return $data;
    }

    public function part1(DefaultInput $input): int
    {
        $grid = $this->create2DGrid(0, 0, 999, 999, false);
        $data = $this->prepareData($input);

        foreach ($data as $d) {
            for ($j = $d['startY']; $j <= $d['endY']; $j++) {
                for ($i = $d['startX']; $i <= $d['endX']; $i++) {
                    $pos = (string)(new Grid2DPosition($i, $j));
                    switch ($d['command']) {
                        case 'turn on':
                            $grid[$pos] = true;
                            break;
                        case 'turn off':
                            $grid[$pos] = false;
                            break;
                        case 'toggle':
                            if ($grid[$pos] === false) {
                                $grid[$pos] = true;
                                break;
                            }
                            $grid[$pos] = false;
                            break;
                    }
                }
            }
        }

        $litLights = array_filter($grid, static function ($k) use ($grid) {
            return $grid[$k];
        }, ARRAY_FILTER_USE_KEY);

        return count($litLights);
    }

    public function part2(DefaultInput $input): int
    {
        $grid = $this->create2DGrid(0, 0, 999, 999, 0);
        $data = $this->prepareData($input);

        foreach ($data as $d) {
            for ($j = $d['startY']; $j <= $d['endY']; $j++) {
                for ($i = $d['startX']; $i <= $d['endX']; $i++) {
                    $pos = (string)(new Grid2DPosition($i, $j));
                    switch ($d['command']) {
                        case 'turn on':
                            $grid[$pos]++;
                            break;
                        case 'turn off':
                            if ($grid[$pos] > 0) {
                                $grid[$pos]--;
                            }
                            break;
                        case 'toggle':
                            $grid[$pos] += 2;
                            break;
                    }
                }
            }
        }

        return array_sum($grid);
    }
}
