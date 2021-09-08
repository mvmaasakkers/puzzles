<?php

namespace App\AdventOfCode\Year2015;

use App\AdventOfCode\AdventOfCode;
use App\Input\DefaultInput;
use App\Input\InputInterface;

class Day15 extends AdventOfCode
{
    private function parseInput(DefaultInput $input): array
    {
        $lines = array_map(static function ($line) {
            [$name, $capacity, $durability, $flavor, $texture, $calories] = sscanf($line,
                '%s capacity %d, durability %d, flavor %d, texture %d, calories %d');
            return [
                'name' => $name,
                'capacity' => $capacity,
                'durability' => $durability,
                'flavor' => $flavor,
                'texture' => $texture,
                'calories' => $calories
            ];
        }, $input->getSplitTrimLines());
        return $lines;
    }

    private function calculate(array $teaspoons, array $ingredients): array
    {
        $types = [
            'capacity',
            'durability',
            'flavor',
            'texture',
        ];

        $scores = [];
        foreach ($types as $type) {
            $ingScore = 0;

            foreach ($ingredients as $k => $ingredient) {
                $ingScore += ($ingredient[$type] * $teaspoons[$k]);
            }
            $scores[] = $ingScore > 0 ? $ingScore : 0;
        }

        $calScore = 0;
        foreach ($ingredients as $k => $ingredient) {
            $calScore += ($ingredient['calories'] * $teaspoons[$k]);
        }

        return ['scores' => array_product($scores), 'calories' => $calScore];
    }

    public function part1(DefaultInput $input): int
    {
        $ingredients = $this->parseInput($input);
        $maxAmount = 100;
        $teaspoonOptions = [];

        if (count($ingredients) === 4) {
            for ($i = 0; $i <= $maxAmount; $i++) {
                for ($j = 0; $j <= $maxAmount - $i; $j++) {
                    for ($k = 0; $k <= $maxAmount - $i - $j; $k++) {
                        for ($l = 0; $l <= $maxAmount - $i - $j - $k; $l++) {
                            if ($i + $j + $k + $l !== $maxAmount) {
                                continue;
                            }
                            $teaspoonOptions[] = [$i, $j, $k, $l];
                        }
                    }
                }
            }
        } else {
            for ($i = 0; $i <= $maxAmount; $i++) {
                $teaspoonOptions[] = [$i, $maxAmount - $i];
            }
        }

        $calc = [];
        foreach ($teaspoonOptions as $teaspoons) {
            $calc[] = $this->calculate($teaspoons, $ingredients)['scores'];
        }

        return max($calc);
    }

    public function part2(DefaultInput $input): int
    {
        $ingredients = $this->parseInput($input);
        $maxAmount = 100;
        $teaspoonOptions = [];

        if (count($ingredients) === 4) {
            for ($i = 0; $i <= $maxAmount; $i++) {
                for ($j = 0; $j <= $maxAmount - $i; $j++) {
                    for ($k = 0; $k <= $maxAmount - $i - $j; $k++) {
                        for ($l = 0; $l <= $maxAmount - $i - $j - $k; $l++) {
                            if ($i + $j + $k + $l !== $maxAmount) {
                                continue;
                            }
                            $teaspoonOptions[] = [$i, $j, $k, $l];
                        }
                    }
                }
            }
        } else {
            for ($i = 0; $i <= $maxAmount; $i++) {
                $teaspoonOptions[] = [$i, $maxAmount - $i];
            }
        }

        $calc = [];
        foreach ($teaspoonOptions as $teaspoons) {
            $res = $this->calculate($teaspoons, $ingredients);
            if($res['calories'] === 500) {
                $calc[] = $res['scores'];
            }
        }

        return max($calc);
    }
}

