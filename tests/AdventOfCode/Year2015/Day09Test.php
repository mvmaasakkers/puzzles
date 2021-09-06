<?php

namespace Puzzles\Tests\AdventOfCode\Year2015;

use PHPUnit\Framework\TestCase;
use Puzzles\AdventOfCode\DefaultInput;
use Puzzles\AdventOfCode\Year2015\Day09;

class Day09Test extends TestCase
{
    public function testPart1()
    {
        $testCases = [
            ['input' => new DefaultInput('London to Dublin = 464
London to Belfast = 518
Dublin to Belfast = 141'), 'expected' => 605],
            ['input' => new DefaultInput($this->actualInput), 'expected' => 251],
        ];

        foreach ($testCases as $n => $testCase) {
            $this->assertEquals($testCase['expected'], (new Day09())->part1($testCase['input']), "Testcase #{$n}");
        }
    }

    public function testPart2()
    {
        $testCases = [
            ['input' => new DefaultInput($this->actualInput), 'expected' => 898],
        ];

        foreach ($testCases as $n => $testCase) {
            $this->assertEquals($testCase['expected'], (new Day09())->part2($testCase['input']), "Testcase #{$n}");
        }
    }

    private $actualInput = 'Tristram to AlphaCentauri = 34
Tristram to Snowdin = 100
Tristram to Tambi = 63
Tristram to Faerun = 108
Tristram to Norrath = 111
Tristram to Straylight = 89
Tristram to Arbre = 132
AlphaCentauri to Snowdin = 4
AlphaCentauri to Tambi = 79
AlphaCentauri to Faerun = 44
AlphaCentauri to Norrath = 147
AlphaCentauri to Straylight = 133
AlphaCentauri to Arbre = 74
Snowdin to Tambi = 105
Snowdin to Faerun = 95
Snowdin to Norrath = 48
Snowdin to Straylight = 88
Snowdin to Arbre = 7
Tambi to Faerun = 68
Tambi to Norrath = 134
Tambi to Straylight = 107
Tambi to Arbre = 40
Faerun to Norrath = 11
Faerun to Straylight = 66
Faerun to Arbre = 144
Norrath to Straylight = 115
Norrath to Arbre = 135
Straylight to Arbre = 127';


}