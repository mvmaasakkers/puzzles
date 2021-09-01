<?php

namespace Puzzles\AdventOfCode\Year2015;

use Puzzles\AdventOfCode\AdventOfCode;
use Puzzles\AdventOfCode\DefaultInput;

class Day05 extends AdventOfCode
{
    private string $vowels = 'aeiou';
    private string $letters = 'abcdefghijklmnopqrstuvwxyz';
    private array $invalidStrings = ['ab', 'cd', 'pq', 'xy'];

    private function containsInvalidString(string $input): bool
    {
        foreach ($this->invalidStrings as $invalidString) {
            if (str_contains($input, $invalidString)) {
                return true;
            }
        }

        return false;
    }

    private function containsVowels(string $input, int $amount): bool
    {
        $vowels = str_split($this->vowels);
        $characters = str_split($input);
        $count = 0;
        foreach ($characters as $character) {
            if (in_array($character, $vowels, true)) {
                $count++;
            }
        }

        return $count >= $amount;
    }

    private function containsLetterTwiceInARow(string $input): bool
    {
        $characters = str_split($input);
        $letters = str_split($this->letters);

        $prevChar = '';
        foreach ($characters as $character) {
            if (in_array($character, $letters, true) && $character === $prevChar) {
                return true;
            }

            $prevChar = $character;
        }

        return false;
    }

    public function part1(DefaultInput $input): int
    {
        $lines = $input->getSplitTrimLines();
        $count = 0;

        foreach ($lines as $line) {
            if ($this->containsInvalidString($line)) {
                continue;
            }

            if (!$this->containsVowels($line, 3)) {
                continue;
            }

            if (!$this->containsLetterTwiceInARow($line)) {
                continue;
            }

            $count++;
        }


        return $count;
    }

    private function containsTwoPairLettersNonOverlapping(string $input): bool
    {
        $characters = str_split($input);
        $len = strlen($input);
        for ($i = 0; $i + 1 < $len; $i++) {
            for ($j = $i + 2; $j + 1 < $len; $j++) {
                if ($characters[$i] . $characters[$i + 1] === $characters[$j] . $characters[$j + 1]) {
                    return true;
                }
            }
        }
        return false;
    }

    private function containsAtLeastOneLetterRepeatingWithOneLetterBetweenThem(string $input): bool
    {
        $characters = str_split($input);
        $len = strlen($input);

        for ($i = 0; $i + 2 < $len; $i++) {
            $p1 = $characters[$i];
            $p3 = $characters[$i + 2];
            if ($p1 === $p3) {
                return true;
            }
        }

        return false;
    }

    public function part2(DefaultInput $input): int
    {
        $lines = $input->getSplitTrimLines();
        $count = 0;

        foreach ($lines as $line) {
            if (!$this->containsTwoPairLettersNonOverlapping($line)) {
                continue;
            }
            if (!$this->containsAtLeastOneLetterRepeatingWithOneLetterBetweenThem($line)) {
                continue;
            }
            $count++;
        }

        return $count;
    }
}
