<?php

namespace App\AdventOfCode\Year2015;

use App\AdventOfCode\AdventOfCode;
use App\Input\DefaultInput;
use App\Helpers\Grid2DPosition;

class Day03 extends AdventOfCode
{

    public function part1(DefaultInput $input): int
    {
        $instructions = $input->getCharacterArray();
        $newPosition = new Grid2DPosition(0, 0);
        $houses = [];
        $houses[(string)$newPosition] = 0;
        foreach ($instructions as $instruction) {
            $newPosition = $this->getNewPosition($newPosition, $instruction);

            if (!isset($houses[(string)$newPosition])) {
                $houses[(string)$newPosition] = true;
            }
        }

        return count($houses);
    }

    public function part2(DefaultInput $input): int
    {
        $instructions = $input->getCharacterArray();
        $houses = array();

        $positions = [
            'santa' => new Grid2DPosition(0, 0),
            'robo' => new Grid2DPosition(0, 0)
        ];
        $houses[(string)$positions['santa']] = 2;
        foreach ($instructions as $loc => $instruction) {
            if ($loc % 2 === 0) {
                $actor = 'santa';
            } else {
                $actor = 'robo';
            }

            $pos = $this->getNewPosition($positions[$actor], $instruction);

            $positions[$actor] = $pos;

            if (!isset($houses[(string)$pos])) {
                $houses[(string)$pos] = 0;
            } else {
                $houses[(string)$pos]++;
            }
        }

        return count($houses);
    }

    private function getNewPosition(Grid2DPosition $oldPosition, string $instruction): Grid2DPosition
    {
        $newPosition = new Grid2DPosition($oldPosition->getX(), $oldPosition->getY());
        switch ($instruction) {
            case ">":
                $newPosition->setX($newPosition->getX() + 1);
                break;
            case "<":
                $newPosition->setX($newPosition->getX() - 1);
                break;
            case "v":
                $newPosition->setY($newPosition->getY() + 1);
                break;
            case "^":
                $newPosition->setY($newPosition->getY() - 1);
                break;
        }

        return $newPosition;
    }
}
