<?php

namespace App\Tests\AdventOfCode\Year2015;

use PHPUnit\Framework\TestCase;
use App\Input\DefaultInput;
use App\AdventOfCode\Year2015\Day14;

class Day14Test extends TestCase
{
    private string $actualInput = 'Dancer can fly 27 km/s for 5 seconds, but then must rest for 132 seconds.
Cupid can fly 22 km/s for 2 seconds, but then must rest for 41 seconds.
Rudolph can fly 11 km/s for 5 seconds, but then must rest for 48 seconds.
Donner can fly 28 km/s for 5 seconds, but then must rest for 134 seconds.
Dasher can fly 4 km/s for 16 seconds, but then must rest for 55 seconds.
Blitzen can fly 14 km/s for 3 seconds, but then must rest for 38 seconds.
Prancer can fly 3 km/s for 21 seconds, but then must rest for 40 seconds.
Comet can fly 18 km/s for 6 seconds, but then must rest for 103 seconds.
Vixen can fly 18 km/s for 5 seconds, but then must rest for 84 seconds.';

    public function testPart1(): void
    {
        $testCases = [
            [
                'input' => new DefaultInput('Comet can fly 14 km/s for 10 seconds, but then must rest for 127 seconds.
Dancer can fly 16 km/s for 11 seconds, but then must rest for 162 seconds.', ['seconds' => 1000]),
                'expected' => 1120
            ],
            ['input' => new DefaultInput($this->actualInput, ['seconds' => 2503]), 'expected' => 2640],
        ];

        foreach ($testCases as $n => $testCase) {
            $this->assertEquals($testCase['expected'], (new Day14())->part1($testCase['input']), "Testcase #$n");
        }
    }

    public function testPart2(): void
    {
        $testCases = [
            [
                'input' => new DefaultInput('Comet can fly 14 km/s for 10 seconds, but then must rest for 127 seconds.
Dancer can fly 16 km/s for 11 seconds, but then must rest for 162 seconds.', ['seconds' => 1000]),
                'expected' => 689
            ],
            ['input' => new DefaultInput($this->actualInput, ['seconds' => 2503]), 'expected' => 1102],
        ];

        foreach ($testCases as $n => $testCase) {
            $this->assertEquals($testCase['expected'], (new Day14())->part2($testCase['input']), "Testcase #$n");
        }
    }
}
