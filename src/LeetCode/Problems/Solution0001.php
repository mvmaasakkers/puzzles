<?php

namespace App\LeetCode\Problems;

use App\Input\ArrayInput;
use App\Input\InputInterface;
use App\LeetCode\LeetCode;

class Solution0001 extends LeetCode
{
    public function puzzle(ArrayInput|InputInterface $input): mixed
    {
        $in = $input->getRawInput();

        return $this->twoSum($in['nums'], $in['target']);
    }

    public function twoSum(array $nums, int $target): array
    {
        foreach ($nums as $i => $num) {
            foreach ($nums as $j => $num2) {
                if ($i !== $j && $num + $num2 === $target) {
                    return [$i, $j];
                }
            }
        }

        return [];
    }
}

