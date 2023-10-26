<?php

declare(strict_types=1);

namespace App;

readonly class AlphabeticalOrder
{
    protected array $strings;

    public function __construct(array $strings = [])
    {
        $this->strings = $strings;
    }

    public function findFirst(): string
    {
        $assoc = [];

        foreach ($this->strings as $string) {
            $assoc[ord($string)] = $string;
        }

        return $assoc[min(array_keys($assoc))];
    }
}
