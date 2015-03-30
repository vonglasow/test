<?php

namespace east\movie\library;

use east\movie;

final class Finder
{
    private $selector;

    public function __construct(finder\selector $selector = null)
    {
        $this->selector = $selector ?: new finder\selector;
    }

    public function directorShouldBe(movie\director $director)
    {
        $finder = clone $this;
        $finder->selector = $this->selector
            ->libraryIs(new movie\library)
                ->directorShouldBe($director)
        ;

        return $finder;
    }

    public function titleShouldBe(movie\title $title)
    {
        $finder = clone $this;
        $finder->selector = $this->selector
            ->libraryIs(new movie\library)
                ->titleShouldBe($title)
        ;

        return $finder;
    }

    public function movieIs(movie $movie)
    {
        $this->selector->movieIs($movie);

        return $this;
    }

    public function libraryIs(movie\library $library)
    {
        $finder = clone $this;
        $library->finderIs($finder);

        return $finder;
    }

    public function listerIs(movie\lister $lister)
    {
        $this->selector->listerIs($lister);

        return $this;
    }
}
