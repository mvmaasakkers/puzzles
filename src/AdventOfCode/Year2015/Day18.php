<?php

namespace App\AdventOfCode\Year2015;

use App\AdventOfCode\AdventOfCode;
use App\Helpers\Grid2DPosition;
use App\Input\DefaultInput;
use App\Input\InputInterface;

class Day18 extends AdventOfCode
{
    public function part1(DefaultInput|InputInterface $input): mixed
    {
        $steps = $input->getOptions()['steps'];
        $mainGrid = $this->parseInput($input);

        for ($step = 0; $step < $steps; $step++) {
            $grid = $mainGrid;
            foreach ($grid as $p => $light) {
                $pos = (new Grid2DPosition())->fromString($p);

                $neighbours = [
                    new Grid2DPosition($pos->getX() - 1, $pos->getY() - 1),
                    new Grid2DPosition($pos->getX(), $pos->getY() - 1),
                    new Grid2DPosition($pos->getX() + 1, $pos->getY() - 1),
                    new Grid2DPosition($pos->getX() - 1, $pos->getY()),
                    new Grid2DPosition($pos->getX() + 1, $pos->getY()),
                    new Grid2DPosition($pos->getX() - 1, $pos->getY() + 1),
                    new Grid2DPosition($pos->getX(), $pos->getY() + 1),
                    new Grid2DPosition($pos->getX() + 1, $pos->getY() + 1),
                ];

                $on = 0;
                foreach ($neighbours as $neighbour) {
                    if (array_key_exists((string)$neighbour, $mainGrid) && $mainGrid[(string)$neighbour] === 1) {
                        $on++;
                    }
                }

                if ($light === 1) {
                    if ($on !== 2 && $on !== 3) {
                        $grid[$p] = 0;
                    }
                } else {
                    if ($on === 3) {
                        $grid[$p] = 1;
                    }
                }

            }
            $mainGrid = $grid;
        }

        return count(array_filter($grid, static function ($light) {
            return $light === 1;
        }));
    }

    public function part2(DefaultInput|InputInterface $input): mixed
    {
        $steps = $input->getOptions()['steps'];
        $mainGrid = $this->parseInput($input);

        $lines = array_map(static function ($line) {
            return str_split($line);
        }, $input->getSplitTrimLines());
        $width = count($lines[0]);
        $height = count($lines);

        $corners = [
            new Grid2DPosition(0, 0),
            new Grid2DPosition(0, $height - 1),
            new Grid2DPosition($width - 1, $height - 1),
            new Grid2DPosition($width - 1, 0),
        ];
        foreach ($corners as $corner) {
            $mainGrid[(string)$corner] = 1;
        }

        for ($step = 0; $step < $steps; $step++) {
            $grid = $mainGrid;
            foreach ($grid as $p => $light) {
                $pos = (new Grid2DPosition())->fromString($p);

                $neighbours = [
                    new Grid2DPosition($pos->getX() - 1, $pos->getY() - 1),
                    new Grid2DPosition($pos->getX(), $pos->getY() - 1),
                    new Grid2DPosition($pos->getX() + 1, $pos->getY() - 1),
                    new Grid2DPosition($pos->getX() - 1, $pos->getY()),
                    new Grid2DPosition($pos->getX() + 1, $pos->getY()),
                    new Grid2DPosition($pos->getX() - 1, $pos->getY() + 1),
                    new Grid2DPosition($pos->getX(), $pos->getY() + 1),
                    new Grid2DPosition($pos->getX() + 1, $pos->getY() + 1),
                ];

                $on = 0;
                foreach ($neighbours as $neighbour) {
                    if (array_key_exists((string)$neighbour, $mainGrid) && $mainGrid[(string)$neighbour] === 1) {
                        $on++;
                    }
                }

                if ($light === 1) {
                    if ($on !== 2 && $on !== 3) {
                        $grid[$p] = 0;
                    }
                } else {
                    if ($on === 3) {
                        $grid[$p] = 1;
                    }
                }

            }

            foreach ($corners as $corner) {
                $grid[(string)$corner] = 1;
            }
            $mainGrid = $grid;
        }

        return count(array_filter($grid, static function ($light) {
            return $light === 1;
        }));
    }

    private function parseInput(DefaultInput|InputInterface $input): array
    {
        $lines = array_map(static function ($line) {
            return str_split($line);
        }, $input->getSplitTrimLines());
        $grid = [];

        foreach ($lines as $y => $yValue) {
            foreach ($yValue as $x => $xValue) {
                $pos = new Grid2DPosition($x, $y);
                $grid[(string)$pos] = $xValue === '#' ? 1 : 0;
            }
        }

        return $grid;
    }
}

