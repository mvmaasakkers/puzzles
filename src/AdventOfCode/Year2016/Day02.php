<?php

namespace App\AdventOfCode\Year2016;

use App\AdventOfCode\AdventOfCode;
use App\Helpers\Grid2DPosition;
use App\Input\DefaultInput;

class Day02 extends AdventOfCode
{
    public function part1(DefaultInput $input): string
    {
        $grid = [
            ['1', '2', '3'],
            ['4', '5', '6'],
            ['7', '8', '9'],
        ];

        $pos = new Grid2DPosition(1, 1);

        $lines = $input->getSplitTrimCharacterArray();
        $code = $this->getCode($lines, $grid, $pos);

        return implode('', $code);
    }

    public function part2(DefaultInput $input): mixed
    {
        $grid = [
            [2 => '1'],
            [1 => '2', 2 => '3', 3 => '4'],
            ['5', '6', '7', '8', '9'],
            [1 => 'A', 2 => 'B', 3 => 'C'],
            [2 => 'D'],
        ];

        $pos = new Grid2DPosition(0, 2);

        $lines = $input->getSplitTrimCharacterArray();
        $code = $this->getCode($lines, $grid, $pos);

        return implode('', $code);
    }

    /**
     * @param array $lines
     * @param array $grid
     * @param Grid2DPosition $pos
     * @return array
     */
    private function getCode(array $lines, array $grid, Grid2DPosition $pos): array
    {
        $code = [];

        foreach ($lines as $y => $line) {
            $number = $grid[$pos->getY()][$pos->getX()];
            foreach ($line as $x => $direction) {
                $newx = $pos->getX();
                $newy = $pos->getY();

                switch ($direction) {
                    case 'U':
                        $newy--;
                        break;
                    case 'D':
                        $newy++;
                        break;
                    case 'L':
                        $newx--;
                        break;
                    case 'R':
                        $newx++;
                        break;
                }

                $newpos = new Grid2DPosition($newx, $newy);
                if (!empty($grid[$newy][$newx])) {
                    $pos = $newpos;
                    $number = $grid[$newy][$newx];
                }
            }
            $code[] = $number;
        }
        return $code;
    }
}

