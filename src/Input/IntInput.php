<?php

namespace App\Input;

class IntInput extends InputInterface
{
    private int $input;

    public function __construct(int $input, array $options = [])
    {
        $this->input = $input;
        $this->setOptions($options);
    }

    /**
     * @return int
     */
    public function getRawInput(): int
    {
        return $this->input;
    }

}
