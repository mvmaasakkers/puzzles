<?php

namespace App\AdventOfCode;

use App\Input\InputInterface;
use JetBrains\PhpStorm\Pure;
use App\Input\DefaultInput;
use App\Helpers\Grid2DPosition;

abstract class AdventOfCode
{
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