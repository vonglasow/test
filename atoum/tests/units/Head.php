<?php

namespace At\tests\units;

use mageekguy\atoum;

class Head extends atoum\test
{
    public function testInstance()
    {
        $this->object($this->newTestedInstance())
            ->isTestedInstance()
            ->string($this->testedInstance->foo())
            ->isEqualTo('foo');
    }
}
