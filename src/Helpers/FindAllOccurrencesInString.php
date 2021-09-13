<?php

namespace App\Helpers;

class FindAllOccurrencesInString
{
    public function __invoke(string $needle, string $haystack): array
    {
        $positions = [];
        $lastPos = 0;
        while (($lastPos = strpos($haystack, $needle, $lastPos))!== false) {
            $positions[] = $lastPos;
            $lastPos += strlen($needle);
        }
        return $positions;
    }
}
