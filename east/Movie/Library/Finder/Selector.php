<?php

namespace east\movie\library\finder;

use east;
use east\movie;
use east\movie\library;

final class Selector
{
    private $library;
    private $directorCriteria;
    private $movieDirector;
    private $titleCriteria;
    private $movieTitle;

    public function __construct()
    {
        $this->library = new movie\library;
    }

    public function libraryIs(movie\library $library)
    {
        $selector = clone $this;
        $selector->library = $library;

        return $selector;
    }

    public function directorShouldBe(movie\director $director)
    {
        $selector = clone $this;
        $selector->directorCriteria = $director;

        return $selector;
    }

    public function titleShouldBe(movie\title $title)
    {
        $selector = clone $this;
        $selector->titleCriteria = $title;

        return $selector;
    }

    public function movieIs(movie $movie)
    {
        $selector = clone $this;

        $movie->selectorIs($selector);

        switch (true)
        {
            case $selector->directorCriteria && $selector->titleCriteria && $selector->movieDirector == $selector->directorCriteria && $selector->movieTitle == $selector->titleCriteria:
            case $selector->directorCriteria && ! $selector->titleCriteria && $selector->movieDirector == $selector->directorCriteria:
            case $selector->titleCriteria && ! $selector->directorCriteria && $selector->movieTitle == $selector->titleCriteria:
                $this->library->newMovie($movie);
        }

        return $this;
    }

    public function movieDirectorIs(movie\director $director)
    {
        $this->movieDirector = $director;

        return $this;
    }

    public function movieTitleIs(movie\title $title)
    {
        $this->movieTitle = $title;

        return $this;
    }

    public function listerIs(movie\lister $lister)
    {
        $this->library->listerIs($lister);

        return $this;
    }
}
