<?php

namespace Pu;

class HeadTest extends \PHPUnit_Framework_TestCase
{
    public function testFoo()
    {
        $h = new \Pu\Head();

        $this->assertEquals('foo', $h->foo());
        $this->assertTrue(true);
    }
}
