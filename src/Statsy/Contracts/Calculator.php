<?php

namespace Statsy\Contracts;

/**
 * Interface Calculator
 *
 * @package Statsy\Contracts
 */
interface Calculator
{
    /**
     * Converts to the provided unit
     *
     * @return mixed
     */
    public function convert($value, $unit);

    /**
     * Performs a round on the provided value
     *
     * @param $value
     * @param $precision
     * @return mixed
     */
    public function roundUp($value, $precision);
}