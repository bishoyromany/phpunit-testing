<?php

use App\Calculator\Division;

use App\Calculator\Exceptions\DivideByZeroException;
use App\Calculator\Exceptions\NoOperandsException;

class DivisionTest extends PHPUnit\Framework\TestCase
{
    public function testDivideGivenOperands()
    {
        $division = new Division;
        $division->setOperands([100, 2]);

        $this->assertEquals(50, $division->calculate());
    }


    public function testDivideByZeroException()
    {
        $this->expectException(DivideByZeroException::class);

        $division = new Division;
        $division->setOperands([100, 0]);
        $division->calculate();
    }

    public function testNoOperandsGivenException()
    {
        $this->expectException(NoOperandsException::class);
        $addition = new Division;
        $addition->calculate();
    }
}
