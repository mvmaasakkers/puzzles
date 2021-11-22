<?php

namespace App\Tests\AdventOfCode\Year2020;

use PHPUnit\Framework\TestCase;
use App\Input\DefaultInput;
use App\AdventOfCode\Year2020\Day22;

class Day22Test extends TestCase
{
    public function testPart1(): void
    {
        $testCases = [
            ['input' => new DefaultInput('Player 1:
9
2
6
3
1

Player 2:
5
8
4
7
10'), 'expected' => 306],
            ['input' => new DefaultInput($this->actualInput), 'expected' => 35013],
        ];

        foreach ($testCases as $n => $testCase) {
            $this->assertEquals($testCase['expected'], (new Day22())->part1($testCase['input']), "Testcase #$n");
        }
    }

    public function testPart2(): void
    {
        $testCases = [
            ['input' => new DefaultInput(''), 'expected' => 0],
            ['input' => new DefaultInput($this->actualInput), 'expected' => 0],
        ];

        foreach ($testCases as $n => $testCase) {
            $this->assertEquals($testCase['expected'], (new Day22())->part2($testCase['input']), "Testcase #$n");
        }
    }

    private string $actualInput = 'Player 1:
26
14
6
34
37
9
17
39
4
5
1
8
49
16
18
47
20
31
23
19
35
41
28
15
44

Player 2:
7
2
10
25
29
46
40
45
11
50
42
24
38
13
36
22
33
3
43
21
48
30
32
12
27';
}
