<?php

namespace App\Input;

abstract class InputInterface
{
    abstract public function getRawInput(): mixed;

    protected array $options = [];

    public function getOptions(): array
    {
        return $this->options;
    }

    public function setOptions(array $options): self
    {
        $this->options = $options;
        return $this;
    }

}
