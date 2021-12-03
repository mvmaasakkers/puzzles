<?php

declare(strict_types=1);

namespace App\AdventOfCode\Year2015;

use App\AdventOfCode\AdventOfCode;
use App\Input\DefaultInput;

class Day25 extends AdventOfCode
{
    public function part1(DefaultInput $input): int
    {
        $code = "20151125";
        $multiplyBy = "252533";
        $divideBy = "33554393";

        $countX = 1;
        $countY = 1;
        $nextY = 2;

        while (true) {
            $code = bcmod(bcmul($code, $multiplyBy), $divideBy);
            if ($countY === 1) {
                $countX = 1;
                $countY = $nextY;
                $nextY++;
            } else {
                $countX++;
                $countY--;
            }

            if ($countX === 3075 && $countY === 2981) {
                break;
            }
        }

        return (int)$code;
    }

    public function part2(DefaultInput $input): int
    {
        return 0;
    }

}

