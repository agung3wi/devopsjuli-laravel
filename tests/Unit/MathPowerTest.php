<?php

namespace Tests\Unit;

use App\Helper\MathHelper;
use PHPUnit\Framework\TestCase;

class MathPowerTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_simple()
    {
        $p = MathHelper::pangkat(3, 4);
        $this->assertEquals(81, $p);
    }

    public function test_bilangan_negatif()
    {
        $p = MathHelper::pangkat(2, -3);
        $this->assertEquals(-8, $p);
    }
}
