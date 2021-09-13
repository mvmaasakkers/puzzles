<?php

namespace App\Helpers;

class Grid2DPosition
{
    private int $x;
    private int $y;

    /**
     * @param int $x
     * @param int $y
     */
    public function __construct(int $x = 0, int $y = 0)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function __toString(): string
    {
        return "x-{$this->x}-y-{$this->y}";
    }

    public function fromString(string $value): self {
         sscanf($value, 'x-%d-y-%d', $x, $y);
         $this->setX($x);
         $this->setY($y);

         return $this;
    }

    /**
     * @return int
     */
    public function getX(): int
    {
        return $this->x;
    }

    /**
     * @param int $x
     */
    public function setX(int $x): void
    {
        $this->x = $x;
    }

    /**
     * @return int
     */
    public function getY(): int
    {
        return $this->y;
    }

    /**
     * @param int $y
     */
    public function setY(int $y): void
    {
        $this->y = $y;
    }
}
