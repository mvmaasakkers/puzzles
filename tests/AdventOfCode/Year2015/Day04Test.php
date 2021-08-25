<?php

namespace Puzzles\Tests\AdventOfCode\Year2015;

use PHPUnit\Framework\TestCase;
use Puzzles\AdventOfCode\DefaultInput;
use Puzzles\AdventOfCode\Year2015\Day04;

class Day04Test extends TestCase
{
    public function testPart1(): void
    {
        $testCases = [
            ['input' => new DefaultInput('abcdef'), 'expected' => 609043],
            ['input' => new DefaultInput('pqrstuv'), 'expected' => 1048970],
            ['input' => new DefaultInput($this->actualInput), 'expected' => 346386],
        ];

        foreach ($testCases as $n => $testCase) {
            $this->assertEquals($testCase['expected'], (new Day04())->part1($testCase['input']), "Testcase #{$n}");
        }
    }

    public function testPart2()
    {
        $testCases = [
            ['input' => new DefaultInput($this->actualInput), 'expected' => 9958218],
        ];

        foreach ($testCases as $n => $testCase) {
            $this->assertEquals($testCase['expected'], (new Day04())->part2($testCase['input']), "Testcase #{$n}");
        }
    }

    private $actualInput = 'iwrupvqb';
}
