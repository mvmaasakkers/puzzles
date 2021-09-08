<?php

namespace App\AdventOfCode;

use JetBrains\PhpStorm\Pure;
use App\Input\DefaultInput;
use App\Helpers\Grid2DPosition;

abstract class AdventOfCode
{
    abstract public function part1(DefaultInput $input): mixed;

    abstract public function part2(DefaultInput $input): mixed;

    /**
     * @param int $startX
     * @param int $startY
     * @param int $endX
     * @param int $endY
     * @param mixed|null $defaultData
     * @return array
     */
    #[Pure] protected function create2DGrid(int $startX, int $startY, int $endX, int $endY, mixed $defaultData = null): array
    {
        $grid = [];
        for ($i = $startX; $i <= $endX; $i++) {
            for ($j = $startY; $j <= $endY; $j++) {
                $pos = new Grid2DPosition($i, $j);
                $grid[(string)$pos] = $defaultData;
            }
        }

        return $grid;
    }
}