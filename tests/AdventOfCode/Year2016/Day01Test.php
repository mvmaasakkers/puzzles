<?php

namespace App\Tests\AdventOfCode\Year2016;

use PHPUnit\Framework\TestCase;
use App\Input\DefaultInput;
use App\AdventOfCode\Year2016\Day01;

class Day01Test extends TestCase
{
    public function testPart1(): void
    {
        $testCases = [
            ['input' => new DefaultInput('R2, L3'), 'expected' => 5],
            ['input' => new DefaultInput('R2, R2, R2'), 'expected' => 2],
            ['input' => new DefaultInput('R5, L5, R5, R3'), 'expected' => 12],
            ['input' => new DefaultInput($this->actualInput), 'expected' => 246],
        ];

        foreach ($testCases as $n => $testCase) {
            $this->assertEquals($testCase['expected'], (new Day01())->part1($testCase['input']), "Testcase #$n");
        }
    }

    public function testPart2(): void
    {
        $testCases = [
//            ['input' => new DefaultInput('R8, R4, R4, R8'), 'expected' => 8],
            ['input' => new DefaultInput($this->actualInput), 'expected' => 0],
        ];

        foreach ($testCases as $n => $testCase) {
            $this->assertEquals($testCase['expected'], (new Day01())->part2($testCase['input']), "Testcase #$n");
        }
    }

    private string $actualInput = 'R2, L3, R2, R4, L2, L1, R2, R4, R1, L4, L5, R5, R5, R2, R2, R1, L2, L3, L2, L1, R3, L5, R187, R1, R4, L1, R5, L3, L4, R50, L4, R2, R70, L3, L2, R4, R3, R194, L3, L4, L4, L3, L4, R4, R5, L1, L5, L4, R1, L2, R4, L5, L3, R4, L5, L5, R5, R3, R5, L2, L4, R4, L1, R3, R1, L1, L2, R2, R2, L3, R3, R2, R5, R2, R5, L3, R2, L5, R1, R2, R2, L4, L5, L1, L4, R4, R3, R1, R2, L1, L2, R4, R5, L2, R3, L4, L5, L5, L4, R4, L2, R1, R1, L2, L3, L2, R2, L4, R3, R2, L1, L3, L2, L4, L4, R2, L3, L3, R2, L4, L3, R4, R3, L2, L1, L4, R4, R2, L4, L4, L5, L1, R2, L5, L2, L3, R2, L2';
}
