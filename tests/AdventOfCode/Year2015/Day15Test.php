<?php

namespace App\Tests\AdventOfCode\Year2015;

use PHPUnit\Framework\TestCase;
use App\Input\DefaultInput;
use App\AdventOfCode\Year2015\Day15;

class Day15Test extends TestCase
{
    private string $actualInput = 'Sugar: capacity 3, durability 0, flavor 0, texture -3, calories 2
Sprinkles: capacity -3, durability 3, flavor 0, texture 0, calories 9
Candy: capacity -1, durability 0, flavor 4, texture 0, calories 1
Chocolate: capacity 0, durability 0, flavor -2, texture 2, calories 8';

    public function testPart1(): void
    {
        $testCases = [
            ['input' => new DefaultInput('Butterscotch: capacity -1, durability -2, flavor 6, texture 3, calories 8
Cinnamon: capacity 2, durability 3, flavor -2, texture -1, calories 3'), 'expected' => 62842880],
            ['input' => new DefaultInput($this->actualInput), 'expected' => 222870],
        ];

        foreach ($testCases as $n => $testCase) {
            $this->assertEquals($testCase['expected'], (new Day15())->part1($testCase['input']), "Testcase #$n");
        }
    }

    public function testPart2(): void
    {
        $testCases = [
            ['input' => new DefaultInput('Butterscotch: capacity -1, durability -2, flavor 6, texture 3, calories 8
Cinnamon: capacity 2, durability 3, flavor -2, texture -1, calories 3'), 'expected' => 57600000],
            ['input' => new DefaultInput($this->actualInput), 'expected' => 117936],
        ];

        foreach ($testCases as $n => $testCase) {
            $this->assertEquals($testCase['expected'], (new Day15())->part2($testCase['input']), "Testcase #$n");
        }
    }
}
