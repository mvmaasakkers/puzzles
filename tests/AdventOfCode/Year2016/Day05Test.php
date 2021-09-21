<?php

namespace App\Tests\AdventOfCode\Year2016;

use PHPUnit\Framework\TestCase;
use App\Input\DefaultInput;
use App\AdventOfCode\Year2016\Day05;

class Day05Test extends TestCase
{
    private string $actualInput = 'ugkcyxxp';

    public function testPart1(): void
    {
        $testCases = [
            ['input' => new DefaultInput('abc'), 'expected' => '18f47a30'],
            ['input' => new DefaultInput($this->actualInput), 'expected' => 'd4cd2ee1'],
        ];

        foreach ($testCases as $n => $testCase) {
            $this->assertEquals($testCase['expected'], (new Day05())->part1($testCase['input']), "Testcase #$n");
        }
    }

    public function testPart2(): void
    {
        $testCases = [
            ['input' => new DefaultInput('abc'), 'expected' => '05ace8e3'],
            ['input' => new DefaultInput($this->actualInput), 'expected' => 'f2c730e5'],
        ];

        foreach ($testCases as $n => $testCase) {
            $this->assertEquals($testCase['expected'], (new Day05())->part2($testCase['input']), "Testcase #$n");
        }
    }
}
