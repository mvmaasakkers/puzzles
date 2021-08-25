<?php

namespace Puzzles\AdventOfCode;

abstract class AdventOfCode
{
    abstract public function part1(DefaultInput $input): mixed;

    abstract public function part2(DefaultInput $input): mixed;
}