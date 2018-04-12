<?php
namespace Tests\Unit;

use Tests\TestCase;

class HelpersTest extends TestCase
{
    public function testTypeFormat(): void
    {
        $value = typeFormat('hh', 'float');
        $this->assertEquals(0, $value);

        $value = typeFormat('hh', 'string');
        $this->assertEquals('hh', $value);

        $value = typeFormat('', 'bool');
        $this->assertEquals('no', $value);

        $value = typeFormat('yes', 'bool');
        $this->assertEquals('yes', $value);

        $value = typeFormat('6', 'int');
        $this->assertEquals(6, $value);
    }
}