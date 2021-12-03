<?php

declare(strict_types=1);

namespace App\AdventOfCode\Year2015;

use App\AdventOfCode\AdventOfCode;
use App\Helpers\ComputePermutations;
use App\Input\ArrayInput;

class Day21 extends AdventOfCode
{
    private $rawShop = 'Weapons:    Cost  Damage  Armor
Dagger        8     4       0
Shortsword   10     5       0
Warhammer    25     6       0
Longsword    40     7       0
Greataxe     74     8       0

Armor:      Cost  Damage  Armor
Leather      13     0       1
Chainmail    31     0       2
Splintmail   53     0       3
Bandedmail   75     0       4
Platemail   102     0       5

Rings:      Cost  Damage  Armor
Damage +1    25     1       0
Damage +2    50     2       0
Damage +3   100     3       0
Defense +1   20     0       1
Defense +2   40     0       2
Defense +3   80     0       3';

    public function shop()
    {
        return [
            'weapons' => [
                ['Dagger', 8, 4, 0],
                ['Shortsword', 10, 5, 0],
                ['Warhammer', 25, 6, 0],
                ['Longsword', 40, 7, 0],
                ['Greataxe', 74, 8, 0],
            ],
            'armor' => [
                ['None', 0, 0, 0],
                ['Leather', 13, 0, 1],
                ['Chainmail', 31, 0, 2],
                ['Splintmail', 53, 0, 3],
                ['Bandedmail', 75, 0, 4],
                ['Platemail', 102, 0, 5],
            ],
            'rings' => [
                ['00', 0, 0, 0],
                ['01', 0, 0, 0],
                ['Damage +1', 25, 1, 0],
                ['Damage +2', 50, 2, 0],
                ['Damage +3', 100, 3, 0],
                ['Defense +1', 20, 0, 1],
                ['Defense +2', 40, 0, 2],
                ['Defense +3', 80, 0, 3],
            ]
        ];
    }

    public function part1(ArrayInput $input): int
    {
        $boss = $input->getRawInput();

        $amount = 10000;
        $shop = $this->shop();

        $ringOptions = (new ComputePermutations())($shop['rings']);
        foreach ($shop['weapons'] as $weapon) {
            foreach ($shop['armor'] as $armor) {

                foreach ($ringOptions as $ringOption) {
                    $totalDamage = $weapon[2] + $ringOption[0][2];
                    $totalArmor = $armor[3] + $ringOption[1][3];

                    $winner = $this->fight(['hp' => 100, 'damage' => $totalDamage, 'armor' => $totalArmor], $boss);
                    $cost = ($armor[1] + $weapon[1] + $ringOption[0][1] + $ringOption[1][1]);
                    if ($winner === 'player' && $cost < $amount) {
                        $amount = $cost;
                    }
                }
            }
        }

        return $amount;
    }

    public function part2(ArrayInput $input): int
    {
        $boss = $input->getRawInput();

        $amount = 0;
        $shop = $this->shop();

        $ringOptions = (new ComputePermutations())($shop['rings']);
        foreach ($shop['weapons'] as $weapon) {
            foreach ($shop['armor'] as $armor) {
                foreach ($ringOptions as $ringOption) {
                    $totalDamage = $weapon[2] + $ringOption[0][2];
                    $totalArmor = $armor[3] + $ringOption[1][3];

                    $winner = $this->fight(['hp' => 100, 'damage' => $totalDamage, 'armor' => $totalArmor], $boss);
                    $cost = ($armor[1] + $weapon[1] + $ringOption[0][1] + $ringOption[1][1]);

                    if ($winner === 'boss' && $cost > $amount) {
                        $amount = $cost;
                    }
                }
            }
        }

        return $amount;
    }

    private function fight($player, $boss)
    {
        while ($player['hp'] > 0 && $boss['hp'] > 0) {
            $doDamage = $player['damage'] - $boss['armor'];
            if ($doDamage < 1) {
                $doDamage = 1;
            }

            $boss['hp'] -= $doDamage;
            if ($boss['hp'] <= 0) {
                return 'player';
            }

            $doDamage = $boss['damage'] - $player['armor'];
            if ($doDamage < 1) {
                $doDamage = 1;
            }

            $player['hp'] -= $doDamage;

            if ($player['hp'] <= 0) {
                return 'boss';
            }
        }
        return 'boss';
    }

}

