<?php

namespace App\AdventOfCode\Year2016;

use App\AdventOfCode\AdventOfCode;
use App\Helpers\Grid2DPosition;
use App\Input\DefaultInput;

class Day01 extends AdventOfCode
{
    private const NORTH = 'north';
    private const EAST = 'east';
    private const SOUTH = 'south';
    private const WEST = 'west';

    public function part1(DefaultInput $input): mixed
    {
        $instructions = array_map(static function ($instruction) {
            return ['turnDirection' => $instruction[0], 'distance' => (int)substr($instruction, 1)];
        }, explode(', ', $input->getRawInput()));

        $facing = self::NORTH;
        $x = 0;
        $y = 0;
        foreach ($instructions as $instruction) {
            $facing = $this->changeDirection($instruction['turnDirection'], $facing);
            switch ($facing) {
                case self::NORTH:
                    $y -= $instruction['distance'];
                    break;
                case self::EAST:
                    $x += $instruction['distance'];
                    break;
                case self::SOUTH:
                    $y += $instruction['distance'];
                    break;
                case self::WEST:
                    $x -= $instruction['distance'];
                    break;

            }
        }
        return abs($x) + abs($y);
    }

    private function changeDirection($turn, $facing): string
    {
        if ($turn === 'R') {
            switch ($facing) {
                case self::NORTH:
                    return self::EAST;
                case self::EAST:
                    return self::SOUTH;
                case self::SOUTH:
                    return self::WEST;
                case self::WEST:
                    return self::NORTH;
            }
        }

        if ($turn === 'L') {
            switch ($facing) {
                case self::NORTH:
                    return self::WEST;
                case self::EAST:
                    return self::NORTH;
                case self::SOUTH:
                    return self::EAST;
                case self::WEST:
                    return self::SOUTH;
            }
        }

        return self::NORTH;
    }

    public function part2(DefaultInput $input): mixed
    {
        $instructions = array_map(static function ($instruction) {
            return ['turnDirection' => $instruction[0], 'distance' => (int)substr($instruction, 1)];
        }, explode(', ', $input->getRawInput()));

        $facing = self::NORTH;
        $positions = [];
        $duplicates = [];
        $x = 0;
        $y = 0;
        foreach ($instructions as $instruction) {
            $facing = $this->changeDirection($instruction['turnDirection'], $facing);
            for ($i = 1; $i <= $instruction['distance']; $i++) {
                switch ($facing) {
                    case self::NORTH:
                        $y--;
                        break;
                    case self::EAST:
                        $x++;
                        break;
                    case self::SOUTH:
                        $y++;
                        break;
                    case self::WEST:
                        $x--;
                        break;
                }
                $pos = new Grid2DPosition($x, $y);

                if(in_array((string)$pos, $positions, true)) {
                    $duplicates[] = (string)$pos;
                }
                $positions[] = (string)$pos;
            }
        }
        $pos = (new Grid2DPosition(0, 0))->fromString($duplicates[0]);
        return abs($pos->getX()) + abs($pos->getY());
    }
}

