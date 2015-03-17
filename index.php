<?php

/**
 * Class foo test
 *
 * @category Test
 * @package  Foo
 */
class Foo
{
    /**
     * Check if ok
     *
     * @return boolean true
     */
    public function isOk()
    {
        return true;
    }

    /**
     * Check if has something
     *
     * @return boolean true
     */
    public function hasSomething()
    {
        return true;
    }

    /**
     * Check if does things
     *
     * @return boolean true
     */
    public function doesThings()
    {
        return true;
    }

    /**
     * Check if does things
     *
     * @return boolean true
     */
    public function canDoSomethings()
    {
        return true;
    }

    public function testifConditions()
    {
        $a = 0;
        $b = 0;

        if ($a == $b) {
            doSomething();
        } else {
            doSomething();
        }

        if ($a == $b)
        {
            foo();
        }
        else
        {
            bar();
        }
    }
}
