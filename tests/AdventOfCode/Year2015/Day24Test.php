<?php

declare(strict_types=1);

namespace App\Tests\AdventOfCode\Year2015;

use PHPUnit\Framework\TestCase;
use App\Input\DefaultInput;
use App\AdventOfCode\Year2015\Day24;

class Day24Test extends TestCase
{
    public function testPart1(): void
    {
        $testCases = [

            ['input' => new DefaultInput($this->actualInput), 'expected' => 10723906903],
        ];

        foreach ($testCases as $n => $testCase) {
            $this->assertEquals($testCase['expected'], (new Day24())->part1($testCase['input']), "Testcase #$n");
        }
    }

    public function testPart2(): void
    {
        $testCases = [
            ['input' => new DefaultInput($this->actualInput), 'expected' => 74850409],
        ];

        foreach ($testCases as $n => $testCase) {
            $this->assertEquals($testCase['expected'], (new Day24())->part2($testCase['input']), "Testcase #$n");
        }
    }

    private string $actualInput = '1
2
3
5
7
13
17
19
23
29
31
37
41
43
53
59
61
67
71
73
79
83
89
97
101
103
107
109
113';
}
