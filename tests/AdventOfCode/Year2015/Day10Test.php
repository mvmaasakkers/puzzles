<?php

namespace App\Tests\AdventOfCode\Year2015;

use PHPUnit\Framework\TestCase;
use App\Input\DefaultInput;
use App\AdventOfCode\Year2015\Day10;

class Day10Test extends TestCase
{
    private $actualInput = '1113122113';

    public function testPart1()
    {
        $testCases = [
            ['input' => new DefaultInput('111221'), 'expected' => 6, 'iterations' => 1],
            ['input' => new DefaultInput('1'), 'expected' => 2, 'iterations' => 1],
            ['input' => new DefaultInput('11'), 'expected' => 2, 'iterations' => 1],
            ['input' => new DefaultInput('21'), 'expected' => 4, 'iterations' => 1],
            ['input' => new DefaultInput('1211'), 'expected' => 6, 'iterations' => 1],
            ['input' => new DefaultInput('1'), 'expected' => 6, 'iterations' => 5],
            ['input' => new DefaultInput($this->actualInput), 'expected' => 360154, 'iterations' => 40],
        ];

        foreach ($testCases as $n => $testCase) {
            $this->assertEquals($testCase['expected'], (new Day10())->part1($testCase['input'], $testCase['iterations']), "Testcase #{$n}");
        }
    }

    public function testPart2()
    {
        $testCases = [
            ['input' => new DefaultInput($this->actualInput), 'expected' => 5103798, 'iterations' => 50],
        ];

        foreach ($testCases as $n => $testCase) {
            $this->assertEquals($testCase['expected'], (new Day10())->part2($testCase['input'], $testCase['iterations']), "Testcase #{$n}");
        }
    }


}
