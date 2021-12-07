<?php

declare(strict_types=1);

namespace App\Tests\AdventOfCode\Year2021;

use PHPUnit\Framework\TestCase;
use App\Input\DefaultInput;
use App\AdventOfCode\Year2021\Day06;

class Day06Test extends TestCase
{
    public function testPart1(): void
    {
        $testCases = [
            ['input' => new DefaultInput('3,4,3,1,2'), 'expected' => 5934],
            ['input' => new DefaultInput($this->actualInput), 'expected' => 386755],
        ];

        foreach ($testCases as $n => $testCase) {
            $this->assertEquals($testCase['expected'], (new Day06())->part1($testCase['input']), "Testcase #$n");
        }
    }

    public function testPart2(): void
    {
        ini_set('memory_limit', '4096m');
        $testCases = [
            ['input' => new DefaultInput('3,4,3,1,2'), 'expected' => 26984457539],
//            ['input' => new DefaultInput($this->actualInput), 'expected' => 0],
        ];

        foreach ($testCases as $n => $testCase) {
            $this->assertEquals($testCase['expected'], (new Day06())->part2($testCase['input']), "Testcase #$n");
        }
    }

    private string $actualInput = '1,3,4,1,5,2,1,1,1,1,5,1,5,1,1,1,1,3,1,1,1,1,1,1,1,2,1,5,1,1,1,1,1,4,4,1,1,4,1,1,2,3,1,5,1,4,1,2,4,1,1,1,1,1,1,1,1,2,5,3,3,5,1,1,1,1,4,1,1,3,1,1,1,2,3,4,1,1,5,1,1,1,1,1,2,1,3,1,3,1,2,5,1,1,1,1,5,1,5,5,1,1,1,1,3,4,4,4,1,5,1,1,4,4,1,1,1,1,3,1,1,1,1,1,1,3,2,1,4,1,1,4,1,5,5,1,2,2,1,5,4,2,1,1,5,1,5,1,3,1,1,1,1,1,4,1,2,1,1,5,1,1,4,1,4,5,3,5,5,1,2,1,1,1,1,1,3,5,1,2,1,2,1,3,1,1,1,1,1,4,5,4,1,3,3,1,1,1,1,1,1,1,1,1,5,1,1,1,5,1,1,4,1,5,2,4,1,1,1,2,1,1,4,4,1,2,1,1,1,1,5,3,1,1,1,1,4,1,4,1,1,1,1,1,1,3,1,1,2,1,1,1,1,1,2,1,1,1,1,1,1,1,2,1,1,1,1,1,1,4,1,1,1,1,1,1,1,1,1,1,1,1,1,1,2,1,1,2,5,1,2,1,1,1,1,1,1,1,1,1';
}
