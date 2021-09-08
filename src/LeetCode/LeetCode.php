<?php

namespace App\LeetCode;

use App\Input\InputInterface;

abstract class LeetCode
{
    abstract public function puzzle(InputInterface $input): mixed;
}
