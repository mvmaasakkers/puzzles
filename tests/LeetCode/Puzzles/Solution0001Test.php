<?php

namespace App\Tests\LeetCode\Puzzles;

use App\Input\ArrayInput;
use App\LeetCode\Puzzles\Solution0001;
use PHPUnit\Framework\TestCase;

class Solution0001Test extends TestCase
{
    public function test(): void
    {
        $cases = [
            [
                'input' => new ArrayInput([
                    "nums" => [2, 7, 11, 15],
                    "target" => 9
                ]),
                "expected" => [0, 1],
            ],
            [
                'input' => new ArrayInput([
                    "nums" => [3, 2, 4],
                    "target" => 6
                ]),
                "expected" => [1, 2],
            ],
            [
                'input' => new ArrayInput([
                    "nums" => [3, 3],
                    "target" => 6
                ]),
                "expected" => [0, 1],
            ],
        ];


        foreach ($cases as $case) {
            $s = new Solution0001();
            self::assertSame($case['expected'], $s->puzzle($case['input']));
        }
    }
}