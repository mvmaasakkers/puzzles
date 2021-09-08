<?php

namespace App\Tests\LeetCode\Problems;

use App\Helpers\ListNode;
use App\Input\ArrayInput;
use App\LeetCode\Problems\Solution0002;
use PHPUnit\Framework\TestCase;

class Solution0002Test extends TestCase
{
    public function test(): void
    {
        $cases = [
            [
                'input' => new ArrayInput([
                    "l1" => new ListNode(2, new ListNode(4, new ListNode(3))),
                    "l2" => new ListNode(5, new ListNode(6, new ListNode(4)))
                ]),
                'expected' => new ListNode(7, new ListNode(0, new ListNode(8))),
            ]
        ];

        foreach ($cases as $case) {
            self::assertEquals($case['expected'], (new Solution0002())->puzzle($case['input']));
        }
    }
}