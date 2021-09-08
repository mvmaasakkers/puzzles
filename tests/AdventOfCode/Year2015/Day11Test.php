<?php

namespace App\Tests\AdventOfCode\Year2015;

use PHPUnit\Framework\TestCase;
use App\Input\DefaultInput;
use App\AdventOfCode\Year2015\Day11;

class Day11Test extends TestCase
{
    private $actualInput = 'hepxcrrq';

    public function testPart1()
    {
        $testCases = [
            ['input' => new DefaultInput('abcdefgh'), 'expected' => 'abcdffaa'],
            ['input' => new DefaultInput('ghijklmn'), 'expected' => 'ghjaabcc'],
            ['input' => new DefaultInput($this->actualInput), 'expected' => 'hepxxyzz'],
        ];

        foreach ($testCases as $n => $testCase) {
            $this->assertEquals($testCase['expected'], (new Day11())->part1($testCase['input']), "Testcase #{$n}");
        }
    }

    public function testPart2()
    {
        $testCases = [
            ['input' => new DefaultInput('hepxxyzz'), 'expected' => 'heqaabcc'],
        ];

        foreach ($testCases as $n => $testCase) {
            $this->assertEquals($testCase['expected'], (new Day11())->part2($testCase['input']), "Testcase #{$n}");
        }
    }


}
