<?php

namespace Puzzles\Tests\AdventOfCode;

use PHPUnit\Framework\TestCase;
use Puzzles\AdventOfCode\DefaultInput;
use Puzzles\AdventOfCode\Template;
use Puzzles\AdventOfCode\Year2015\Day02;

class TemplateTest extends TestCase
{
    public function testPart1()
    {
        $testCases = [
            ['input' => new DefaultInput(''), 'expected' => 0],
            ['input' => new DefaultInput($this->actualInput), 'expected' => 0],
        ];

        foreach ($testCases as $n => $testCase) {
            $this->assertEquals($testCase['expected'], (new Template())->part1($testCase['input']), "Testcase #{$n}");
        }
    }

    public function testPart2()
    {
        $testCases = [
            ['input' => new DefaultInput(''), 'expected' => 0],
            ['input' => new DefaultInput($this->actualInput), 'expected' => 0],
        ];

        foreach ($testCases as $n => $testCase) {
            $this->assertEquals($testCase['expected'], (new Template())->part2($testCase['input']), "Testcase #{$n}");
        }
    }

    private $actualInput = '';
}
