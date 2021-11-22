<?php

namespace App\Tests\AdventOfCode\Year2020;

use PHPUnit\Framework\TestCase;
use App\Input\DefaultInput;
use App\AdventOfCode\Year2020\Day23;

class Day23Test extends TestCase
{
    private string $actualInput = '';

    public function testPart1(): void
    {
        $testCases = [
            ['input' => new DefaultInput(''), 'expected' => 0],
            ['input' => new DefaultInput($this->actualInput), 'expected' => 0],
        ];

        foreach ($testCases as $n => $testCase) {
            $this->assertEquals($testCase['expected'], (new Day23())->part1($testCase['input']), "Testcase #$n");
        }
    }

    public function testPart2(): void
    {
        $testCases = [
            ['input' => new DefaultInput(''), 'expected' => 0],
            ['input' => new DefaultInput($this->actualInput), 'expected' => 0],
        ];

        foreach ($testCases as $n => $testCase) {
            $this->assertEquals($testCase['expected'], (new Day23())->part2($testCase['input']), "Testcase #$n");
        }
    }
}
