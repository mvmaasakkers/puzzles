<?= "<?php\n"; ?>

namespace <?= $namespace; ?>;

use App\AdventOfCode\AdventOfCode;
use App\Input\DefaultInput;

class <?= $class_name ?> extends AdventOfCode
{
    public function part1(DefaultInput $input): mixed
    {
        $data = $this->parseInput($input);
        $output = 0;

        return $output;
    }

    public function part2(DefaultInput $input): mixed
    {
        $data = $this->parseInput($input);
        $output = 0;

        return $output;
    }

    private function parseInput(DefaultInput $input): array
    {
        $output = [];

        return $output;
    }
}

