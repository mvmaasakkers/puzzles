<?php

namespace App\Input;

class ArrayInput implements InputInterface
{
    private array $input;
    private int $inputLength;

    public function __construct(array $input)
    {
        $this->input = $input;
        $this->inputLength = count($input);
    }

    /**
     * @return string
     */
    public function getRawInput(): array
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
}
