<?php

declare(strict_types=1);

namespace App\AdventOfCode\Year2021;

use App\AdventOfCode\AdventOfCode;
use App\Helpers\Grid2DPosition;
use App\Input\DefaultInput;

class Day05 extends AdventOfCode
{
    public function part1(DefaultInput $input): int
    {
        $data = $this->parseInput($input);
        $grid = [];
        foreach ($data as $line) {

            $miny = min($line['fromY'], $line['toY']);
            $minx = min($line['fromX'], $line['toX']);
            $maxy = $line['fromY'] + $line['toY'] - $miny;
            $maxx = $line['fromX'] + $line['toX'] - $minx;

            if (
                ($line['fromX'] !== $line['toX'] && $line['fromY'] === $line['toY']) ||
                ($line['fromX'] === $line['toX'] && $line['fromY'] !== $line['toY'])) {
                for ($y = $miny; $y <= $maxy; $y++) {
                    for ($x = $minx; $x <= $maxx; $x++) {
                        if (!isset($grid[(string)(new Grid2DPosition($x, $y))])) {
                            $grid[(string)(new Grid2DPosition($x, $y))] = 0;
                        }
                        $grid[(string)(new Grid2DPosition($x, $y))]++;
                    }
                }
            }
        }

        return count(array_filter($grid, static function (int $i) {
            return $i > 1;
        }));
    }

    public function part2(DefaultInput $input): int
    {
        $data = $this->parseInput($input);
        $grid = [];
        foreach ($data as $line) {
            extract($line, EXTR_OVERWRITE);

            $minY = min($fromY, $toY);
            $minX = min($fromX, $toX);
            $maxY = $fromY + $toY - $minY;
            $maxX = $fromX + $toX - $minX;

            if (
                ($fromX !== $toX && $fromY === $toY) ||
                ($fromX === $toX && $fromY !== $toY)) {

                for ($y = $minY; $y <= $maxY; $y++) {
                    for ($x = $minX; $x <= $maxX; $x++) {
                        if (!isset($grid[(string)(new Grid2DPosition($x, $y))])) {
                            $grid[(string)(new Grid2DPosition($x, $y))] = 0;
                        }
                        $grid[(string)(new Grid2DPosition($x, $y))]++;
                    }
                }
            } else {
                $xDir = $fromX > $toX ? -1 : 1;
                $yDir = $fromY > $toY ? -1 : 1;

                $y = $fromY;
                for ($x = $fromX; $x != ($toX + $xDir); $x += $xDir) {
                    if (!isset($grid[(string)(new Grid2DPosition($x, $y))])) {
                        $grid[(string)(new Grid2DPosition($x, $y))] = 0;
                    }
                    $grid[(string)(new Grid2DPosition($x, $y))]++;

                    $y += $yDir;
                }
            }
        }

        return count(array_filter($grid, static function (int $i) {
            return $i > 1;
        }));
    }

    private function parseInput(DefaultInput $input): array
    {
        $output = array_map(static function ($v) {
            [$l, $r] = explode(" -> ", $v);
            [$x1, $y1] = explode(",", $l);
            [$x2, $y2] = explode(",", $r);

            return [
                'fromX' => (int)$x1,
                'fromY' => (int)$y1,
                'toX' => (int)$x2,
                'toY' => (int)$y2,
            ];
        }, $input->getSplitTrimLines());

        return $output;
    }
}

