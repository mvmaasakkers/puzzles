<?php

namespace App\AdventOfCode\Year2015;

use JetBrains\PhpStorm\Pure;
use App\AdventOfCode\AdventOfCode;
use App\AdventOfCode\DefaultInput;

class Day11 extends AdventOfCode
{
    private string $alphabet = 'abcdefghijklmnopqrstuvwxyz';
    private array $invalidCharacters = ['i', 'o', 'l'];
    private array $alphabetOptions;
    private array $overlappingLetters;

    public function __construct()
    {
        $this->alphabetOptions = array_filter(array_merge(
            str_split($this->alphabet, 3),
            str_split(substr($this->alphabet, 1), 3),
            str_split(substr($this->alphabet, 2), 3)
        ), static function (string $value) {
            return strlen($value) === 3;
        });

        $this->overlappingLetters = array_map(static function (string $value) {
            return $value . $value;
        }, str_split($this->alphabet));
    }

    private function includesStraight(string $password): bool
    {
        foreach ($this->alphabetOptions as $option) {
            if (str_contains($password, $option)) {
                return true;
            }
        }
        return false;
    }

    private function doesNotContainInvalidLetters(string $password): bool
    {
        foreach ($this->invalidCharacters as $option) {
            if (str_contains($password, $option)) {
                return false;
            }
        }
        return true;
    }

    private function containsAtLeast2DifferentPairs(string $password): bool
    {
        $count = 0;
        foreach ($this->overlappingLetters as $letter) {
            if (str_contains($password, $letter)) {
                $count++;
            }
        }

        return $count >= 2;
    }

    #[Pure] private function isValidPassword(string $password): bool
    {
        return $this->includesStraight($password) && $this->doesNotContainInvalidLetters($password) && $this->containsAtLeast2DifferentPairs($password);
    }

    #[Pure] public function part1(DefaultInput $input): string
    {
        $password = $input->getRawInput();
        while (true) {
            $password = ++$password;
            if ($this->isValidPassword($password)) {
                return $password;
            }
        }
    }

    #[Pure] public function part2(DefaultInput $input): string
    {
        $password = $input->getRawInput();
        while (true) {
            $password = ++$password;
            if ($this->isValidPassword($password)) {
                return $password;
            }
        }
    }
}
