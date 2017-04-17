<?php

namespace Statsy\Utilities;

use Statsy\Contracts\Calculator as CalculatorInterface;

/**
 * Class Calculator
 *
 * @package Statsy\Utilities
 */
class Calculator implements CalculatorInterface
{
    /**
     * Converts to the provided unit
     *
     * @return mixed
     */
    public function convert($value, $unit)
    {
        if ($unit == 'mb') {
            return $this->roundUp($value / 1024, 2);
        }

        return $this->roundUp($value / 1024 / 1024, 2);
    }

    /**
     * Performs a round on the provided value
     *
     * @param $value
     * @param $precision
     * @return mixed
     */
    public function roundUp($value, $precision)
    {
        $pow = pow(10, $precision);

        return (ceil($pow * $value ) + ceil($pow * $value - ceil($pow * $value))) / $pow;
    }
}