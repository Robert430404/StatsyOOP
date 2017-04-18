<?php

namespace Statsy\Contracts;

/**
 * Interface MemoryCalculator
 *
 * @package Statsy\Contracts
 */
interface ByteCalculator extends Calculator
{
    /**
     * Calculates the different values for the properties
     *
     * @return ByteCalculator
     */
    public function calculate($totalMemory);

    /**
     * Returns a KiloByte representation of the provided value
     *
     * @return mixed
     */
    public function kb();

    /**
     * Returns a MegaByte representation of the provided value
     *
     * @return mixed
     */
    public function mb();

    /**
     * Returns a GigaByte representation of the provided value
     *
     * @return mixed
     */
    public function gb();
}