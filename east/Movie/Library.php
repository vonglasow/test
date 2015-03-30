<?php

namespace east\movie;

use east;

final class Library
{
    private $movies;

    public function __construct()
    {
        $this->movies = [];
    }

    public function newMovie(east\movie $movie)
    {
        $this->movies[] = $movie;

        return $this;
    }

    public function finderIs(library\finder $finder)
    {
        foreach ($this->movies as $movie) {
            $finder->movieIs($movie);
        }

        return $this;
    }

    public function listerIs(lister $lister)
    {
        foreach ($this->movies as $movie) {
            $lister->movieIs($movie);
        }

        return $this;
    }
}
