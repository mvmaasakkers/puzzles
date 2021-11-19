<?php

namespace App\Input;

class DefaultInput extends InputInterface
{
    private string $input;
    private int $inputLength;

    public function __construct(string $input, array $options = [])
    {
        $this->input = $input;
        $this->inputLength = strlen($input);
        $this->setOptions($options);
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

    public function getSplitTrimCharacterArray(): array
    {
        return array_map(
            fn(string $v): array => str_split(trim($v)),
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

    /**
     * @return array
     */
    public function getIntCodeInput(): array
    {
        return array_map(static fn($value) => (int)$value, explode(',', trim($this->getRawInput())));
    }
}
