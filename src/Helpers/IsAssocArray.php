<?php

namespace Puzzles\Helpers;

class IsAssocArray
{
    public function __invoke(array $array): bool
    {
        return count(array_filter(array_keys($array), 'is_string')) > 0;
    }
}
