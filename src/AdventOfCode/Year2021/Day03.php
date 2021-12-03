<?php

declare(strict_types=1);

namespace App\AdventOfCode\Year2021;

use App\AdventOfCode\AdventOfCode;
use App\Input\DefaultInput;

class Day03 extends AdventOfCode
{
    public function part1(DefaultInput $input): int
    {
        $data = $input->getSplitTrimLines();
        $chars = [];

        foreach ($data as $d) {
            foreach (str_split($d) as $k => $v) {
                $chars[$k][] = $v;
            }
        }

        $a = "";
        $b = "";
        foreach ($chars as $char) {
            $l = count(array_filter($char, static fn(int $v) => $v === 1));
            $r = count(array_filter($char, static fn(int $v) => $v === 0));

            $a .= ($l > $r) ? 1 : 0;
            $b .= ($l > $r) ? 0 : 1;
        }

        return bindec($a) * bindec($b);
    }

    public function part2(DefaultInput $input): int
    {
        $data = $input->getSplitTrimLines();

        $iMax = strlen($data[0]);
        $lOptions = $data;
        $rOptions = $data;
        while (count($lOptions) > 1) {
            for ($i = 0; $i < $iMax; $i++) {
                [$l, $r] = $this->countCharacters($lOptions, $i);

                $mostCommon = ($l > $r || $l === $r) ? 1 : 0;

                $lOptions = array_filter($lOptions, static function (string $v) use ($mostCommon, $i) {
                    return (int)$v[$i] === $mostCommon;
                });

                if (count($lOptions) === 1) {
                    break;
                }
            }
        }
        while (count($rOptions) > 1) {
            for ($i = 0; $i < $iMax; $i++) {
                [$l, $r] = $this->countCharacters($rOptions, $i);

                $leastCommon = ($l > $r || $l === $r) ? 0 : 1;

                $rOptions = array_filter($rOptions, static function (string $v) use ($leastCommon, $i) {
                    return (int)$v[$i] === $leastCommon;
                });

                if (count($rOptions) === 1) {
                    break;
                }
            }
        }

        return bindec(array_values($lOptions)[0]) * bindec(array_values($rOptions)[0]);
    }

    private function countCharacters(array $options, $i): array {
        $chars = [];

        foreach ($options as $d) {
            foreach (str_split($d) as $k => $v) {
                $chars[$k][] = $v;
            }
        }
        $l = count(array_filter($chars[$i], static fn(int $v) => $v === 1));
        $r = count(array_filter($chars[$i], static fn(int $v) => $v === 0));

        return [$l, $r];
    }
}

