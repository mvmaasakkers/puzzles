<?php

namespace App\Tests\AdventOfCode\Year2015;

use App\AdventOfCode\Year2015\Day20;
use App\Input\IntInput;
use PHPUnit\Framework\TestCase;

class Day20Test extends TestCase
{
    private int $actualInput = 34000000;

    public function testPart1(): void
    {
        $testCases = [
            ['input' => new IntInput(70), 'expected' => 4],
            ['input' => new IntInput($this->actualInput), 'expected' => 786240],
        ];

        foreach ($testCases as $n => $testCase) {
            $this->assertEquals($testCase['expected'], (new Day20())->part1($testCase['input']), "Testcase #$n");
        }
    }

    public function testPart2(): void
    {
        $testCases = [
            ['input' => new IntInput(70), 'expected' => 4],
            ['input' => new IntInput($this->actualInput), 'expected' => 0],
        ];

        foreach ($testCases as $n => $testCase) {
            $this->assertEquals($testCase['expected'], (new Day20())->part2($testCase['input']), "Testcase #$n");
        }
    }
}
