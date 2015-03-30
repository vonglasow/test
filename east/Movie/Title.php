<?php

namespace east\movie;

use east;

final class Title
{
    private $value;

    public function __construct($value)
    {
        if (! is_string($value)) {
            throw new \domainException('Movie title should be a string');
        }

        $this->value = $value;
    }

    public function __toString()
    {
        return $this->value;
    }
}
