<?php

namespace Puzzles\AdventOfCode\Year2015;

use JetBrains\PhpStorm\Pure;
use Puzzles\AdventOfCode\AdventOfCode;
use Puzzles\AdventOfCode\DefaultInput;

class Day04 extends AdventOfCode
{
    /**
     * @param string $input
     * @param int $numberOfZeroes
     * @return int
     */
    private function calculateHash(string $input, int $numberOfZeroes): int {
        $checkFor = str_repeat('0', $numberOfZeroes);
        $pos = 0;

        while (true) {
            if(str_starts_with(md5("$input$pos"), $checkFor)) {
                break;
            }
            $pos++;
        }

        return $pos;
    }

    /**
     * @param DefaultInput $input
     * @return int
     */
    #[Pure] public function part1(DefaultInput $input): int
    {
        return $this->calculateHash($input->getRawInput(), 5);
    }

    /**
     * @param DefaultInput $input
     * @return int
     */
    #[Pure] public function part2(DefaultInput $input): int
    {
        return $this->calculateHash($input->getRawInput(), 6);
    }
}
