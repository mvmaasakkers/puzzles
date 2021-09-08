<?php

namespace App\LeetCode\Problems;

use App\Input\ArrayInput;
use App\Input\InputInterface;
use App\LeetCode\LeetCode;

class Solution0014 extends LeetCode
{
    public function puzzle(ArrayInput|InputInterface $input): string
    {
        return $this->longestCommonPrefix($input->getRawInput());
    }

    /**
     * @param String[] $words
     * @return String
     */
    public function longestCommonPrefix(array $words): string
    {
        $firstWord = $words[0];
        $firstWordLen = strlen($firstWord);
        $longestPrefix = '';
        for ($i = 0; $i < $firstWordLen; $i++) {
            $prefix = substr($firstWord, 0, $i + 1);
            $options = array_filter($words, function ($word) use ($prefix, $i) {
                return strpos($word, $prefix) === 0;
            });

            if (count($options) === count($words)) {
                $longestPrefix = $prefix;
            }
        }
        return $longestPrefix;
    }
}

