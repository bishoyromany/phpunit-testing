<?php

namespace App\Calculator;


abstract class OperationAbstract
{
    protected $operands = [];


    public function setOperands(array $operands): bool
    {
        $this->operands = $operands;
        return true;
    }
}
