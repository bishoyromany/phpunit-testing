<?php

namespace App\Calculator;

use App\Calculator\Exceptions\NoOperandsException;
use App\Calculator\Exceptions\DivideByZeroException;

class Division extends OperationAbstract implements OperationInterface
{

    public function calculate()
    {
        if (count($this->operands) === 0) {
            throw new NoOperandsException;
        }

        if (array_search(0, $this->operands) !== false) {
            throw new DivideByZeroException;
        }

        return array_reduce($this->operands, function ($a, $b) {
            if ($a !== null && $b !== null) {
                return $a / $b;
            }
            return $b;
        }, null);
    }
}
