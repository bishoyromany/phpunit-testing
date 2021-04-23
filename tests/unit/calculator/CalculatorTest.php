<?php

use App\Calculator\Addition;
use App\Calculator\Calculator;
use App\Calculator\Division;

class CalculatorTest extends PHPUnit\Framework\TestCase
{
    public function testSetSingleOperation()
    {
        $addition = new Addition;

        $addition->setOperands([2, 5]);

        $calculator = new Calculator;

        $calculator->setOperation($addition);

        $this->assertCount(1, $calculator->getOperations());
    }


    public function testCanSetMultipleOperations()
    {
        $addition1 = new Addition;
        $addition1->setOperands([2, 5]);

        $addition2 = new Addition;
        $addition2->setOperands([15, 5]);

        $calculator = new Calculator;

        $calculator->setOperations([$addition1, $addition2]);

        $this->assertCount(2, $calculator->getOperations());
    }

    public function testOperationsAreIgnoredIfNotInstanceOfOperationInterface()
    {
        $addition = new Addition;
        $addition->setOperands([2, 5]);

        $calculator = new Calculator;
        $calculator->setOperations([$addition, 5]);

        $this->assertCount(1, $calculator->getOperations());
    }


    public function testCalculateResult()
    {
        $addition = new Addition;
        $addition->setOperands([2, 5]);

        $calculator = new Calculator;
        $calculator->setOperation($addition);

        $this->assertContains(7, $calculator->calculate());
    }

    public function testCalculateResultMultipleValues()
    {
        $addition = new Addition;
        $addition->setOperands([2, 5]);
        $divition = new Division;
        $divition->setOperands([100, 2]);

        $calculator = new Calculator;
        $calculator->setOperations([$addition, $divition]);

        $this->assertIsArray($calculator->calculate());
        $this->assertCount(2, $calculator->calculate());
        $this->assertContains(7, $calculator->calculate());
        $this->assertContains(50, $calculator->calculate());
    }
}
