<?= "<?php\n"; ?>

namespace <?= $namespace ?>;

use PHPUnit\Framework\TestCase;
use App\AdventOfCode\DefaultInput;
use App\AdventOfCode\<?= $year ?>\<?= $day ?>;

class <?= $class_name ?> extends TestCase
{
    private string $actualInput = '';

    public function testPart1(): void
    {
        $testCases = [
            ['input' => new DefaultInput(''), 'expected' => 0],
            ['input' => new DefaultInput($this->actualInput), 'expected' => 0],
        ];

        foreach ($testCases as $n => $testCase) {
            $this->assertEquals($testCase['expected'], (new <?= $day ?>())->part1($testCase['input']), "Testcase #$n");
        }
    }

    public function testPart2(): void
    {
        $testCases = [
            ['input' => new DefaultInput(''), 'expected' => 0],
            ['input' => new DefaultInput($this->actualInput), 'expected' => 0],
        ];

        foreach ($testCases as $n => $testCase) {
            $this->assertEquals($testCase['expected'], (new <?= $day ?>())->part2($testCase['input']), "Testcase #$n");
        }
    }
}
