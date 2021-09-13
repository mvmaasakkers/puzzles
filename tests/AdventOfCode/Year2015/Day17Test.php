<?php

namespace App\Tests\AdventOfCode\Year2015;

use PHPUnit\Framework\TestCase;
use App\Input\DefaultInput;
use App\AdventOfCode\Year2015\Day17;

class Day17Test extends TestCase
{
    private string $actualInput = '50
44
11
49
42
46
18
32
26
40
21
7
18
43
10
47
36
24
22
40';

    public function testPart1(): void
    {
        $testCases = [
            ['input' => new DefaultInput('20
            15
            10
            5
            5', ['eggnog' => 25]), 'expected' => 4],
            ['input' => new DefaultInput($this->actualInput, ['eggnog' => 150]), 'expected' => 654],
        ];

        foreach ($testCases as $n => $testCase) {
            $this->assertEquals($testCase['expected'], (new Day17())->part1($testCase['input']), "Testcase #$n");
        }
    }

    public function testPart2(): void
    {
        $testCases = [
            ['input' => new DefaultInput('20
            15
            10
            5
            5', ['eggnog' => 25]), 'expected' => 3],
            ['input' => new DefaultInput($this->actualInput, ['eggnog' => 150]), 'expected' => 0],
        ];

        foreach ($testCases as $n => $testCase) {
            $this->assertEquals($testCase['expected'], (new Day17())->part2($testCase['input']), "Testcase #$n");
        }
    }
}
