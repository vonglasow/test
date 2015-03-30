<?php

namespace east\movie;

use east;

final class Lister
{
    public function newMovie()
    {
        echo '-------------------------' . PHP_EOL;

        return $this;
    }

    public function noMoreDataAboutMovie()
    {
        return $this;
    }

    public function movieIs(east\movie $movie)
    {
        $movie->listerIs($this);

        return $this;
    }

    public function movieDirectorIs(director $director)
    {
        echo 'Director: ' . $director . PHP_EOL;

        return $this;
    }

    public function movieTitleIs(title $title)
    {
        echo 'Title: ' . $title . PHP_EOL;

        return $this;
    }
}
