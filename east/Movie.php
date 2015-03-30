<?php

namespace east;

use east\movie;

class Movie
{
    private $director;
    private $title;

    public function __construct(movie\director $director, movie\title $title)
    {
        $this->director = $director;
        $this->title = $title;
    }

    public function selectorIs(movie\library\finder\selector $selector)
    {
        $selector
            ->movieDirectorIs($this->director)
            ->movieTitleIs($this->title)
        ;

        return $this;
    }

    public function listerIs(movie\lister $lister)
    {
        $lister
            ->newMovie()
                ->movieTitleIs($this->title)
                ->movieDirectorIs($this->director)
                    ->noMoreDataAboutMovie()
        ;

        return $this;
    }
}
