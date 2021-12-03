<?php

declare(strict_types=1);

namespace App\Tests\AdventOfCode\Year2015;

use PHPUnit\Framework\TestCase;
use App\Input\DefaultInput;
use App\AdventOfCode\Year2015\Day25;

class Day25Test extends TestCase
{
    private string $actualInput = 'To continue, please consult the code grid in the manual.  Enter the code at row 2981, column 3075.';

    public function testPart1(): void
    {
        $testCases = [
            ['input' => new DefaultInput($this->actualInput), 'expected' => 9132360],
        ];

        foreach ($testCases as $n => $testCase) {
            $this->assertEquals($testCase['expected'], (new Day25())->part1($testCase['input']), "Testcase #$n");
        }
    }

    public function testPart2(): void
    {
        $testCases = [
            ['input' => new DefaultInput(''), 'expected' => 0],
            ['input' => new DefaultInput($this->actualInput), 'expected' => 0],
        ];

        foreach ($testCases as $n => $testCase) {
            $this->assertEquals($testCase['expected'], (new Day25())->part2($testCase['input']), "Testcase #$n");
        }
    }
}
