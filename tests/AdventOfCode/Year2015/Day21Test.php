<?php

declare(strict_types=1);

namespace App\Tests\AdventOfCode\Year2015;

use App\AdventOfCode\Year2015\Day21;
use App\Input\ArrayInput;
use PHPUnit\Framework\TestCase;

class Day21Test extends TestCase
{
    public function testPart1(): void
    {
        $testCases = [
            ['input' => new ArrayInput($this->actualInput), 'expected' => 91],
        ];

        foreach ($testCases as $n => $testCase) {
            $this->assertEquals($testCase['expected'], (new Day21())->part1($testCase['input']), "Testcase #$n");
        }
    }

    public function testPart2(): void
    {
        $testCases = [
            ['input' => new ArrayInput($this->actualInput), 'expected' => 158],
        ];

        foreach ($testCases as $n => $testCase) {
            $this->assertEquals($testCase['expected'], (new Day21())->part2($testCase['input']), "Testcase #$n");
        }
    }

    private array $actualInput = ['hp' => 100, 'damage' => 8, 'armor' => 2];
}
