<?php

namespace App\Tests\LeetCode\Problems;

use App\Input\ArrayInput;
use App\LeetCode\Problems\Solution0014;
use PHPUnit\Framework\TestCase;

class Solution0014Test extends TestCase
{
    public function test(): void
    {
        $cases = [
            ['input' => new ArrayInput(['flower', 'flow', 'flight']), 'expected' => 'fl'],
            ['input' => new ArrayInput(['dog', 'racecar', 'car']), 'expected' => ''],
            ['input' => new ArrayInput(['a']), 'expected' => 'a'],
            ['input' => new ArrayInput(['bro', 'bra']), 'expected' => 'br'],
        ];

        foreach ($cases as $case) {
            self::assertSame($case['expected'], (new Solution0014())->puzzle($case['input']));
        }
    }
}