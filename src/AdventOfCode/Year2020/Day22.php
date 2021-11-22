<?php

namespace App\AdventOfCode\Year2020;

use App\AdventOfCode\AdventOfCode;
use App\Input\DefaultInput;

class Day22 extends AdventOfCode
{
    public function part1(DefaultInput $input): mixed
    {
        $players = $this->parseInput($input);
        $output = 0;

        // Play until one deck is empty
        while(!empty($players[0]['cards']) && !empty($players[1]['cards'])) {
            $cards = [];
            $cards[0] = array_shift($players[0]['cards']);
            $cards[1] = array_shift($players[1]['cards']);

            if ($cards[0] > $cards[1]) {
                $players[0]['cards'][] = $cards[0];
                $players[0]['cards'][] = $cards[1];
            } elseif ($cards[1] > $cards[0]) {
                $players[1]['cards'][] = $cards[1];
                $players[1]['cards'][] = $cards[0];
            }
        }

        $winner = (empty($players[0]['cards'])) ? 1 : 0;

        $cards = array_reverse($players[$winner]['cards']);
        foreach($cards as $i => $card) {
            $output += $card * ($i + 1);
        }

        return $output;
    }

    public function part2(DefaultInput $input): mixed
    {
        $data = $this->parseInput($input);
        $output = 0;

        return $output;
    }

    private function parseInput(DefaultInput $input): array
    {
        $output = array_map(
            static function ($v) {
                $lines = explode("\n", $v);
                $player = $lines[0];
                array_shift($lines);

                $cards = array_map(static function ($v) {
                    return (int)$v;
                }, $lines);

                return ['player' => $player, 'cards' => $cards];
            },
            explode("\n\n", $input->getRawInput())
        );

        return $output;
    }
}

