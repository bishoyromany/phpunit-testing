<?php

use App\Calculator\Addition;
use App\Calculator\OperationInterface;
use App\Calculator\Exceptions\NoOperandsException;

class AdditionTest extends PHPUnit\Framework\TestCase
{

    public function testAdditionOperationInterace()
    {
        $addition = new Addition;
        $this->assertInstanceOf(OperationInterface::class, $addition);
    }

    public function testAddsUpGivenOperands()
    {
        $addition = new Addition;
        $addition->setOperands([5, 10]);

        $this->assertEquals(15, $addition->calculate());
    }

    public function testNoOperandsGivenExceptionWhenCalculating()
    {
        $this->expectException(NoOperandsException::class);
        $addition = new Addition;
        $addition->calculate();
    }
}
