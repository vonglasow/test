<?php

namespace east\movie;

use east;

final class Director
{
    private $value;

    public function __construct($value)
    {
        if (! is_string($value)) {
            throw new \domainException('Movie Director should be a string');
        }

        $this->value = $value;
    }

    public function __toString()
    {
        return $this->value;
    }
}
