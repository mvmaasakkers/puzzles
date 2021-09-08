<?php

namespace App\AdventOfCode;

class DefaultInput
{
    private string $input;
    private int $inputLength;

    public function __construct(string $input)
    {
        $this->input = $input;
        $this->inputLength = strlen($input);
    }

    /**
     * @return string
     */
    public function getRawInput(): string
    {
        return $this->input;
    }

    /**
     * @return int
     */
    public function getRawInputLenght(): int
    {
        return $this->inputLength;
    }

    public function getSplitTrimLines(): array
    {
        return array_map(
            fn(string $v): string => trim($v),
            explode("\n", $this->getRawInput())
        );
    }

    /**
     * @return array
     */
    public function getCharacterArray(): array
    {
        return str_split($this->getRawInput());
    }
}
