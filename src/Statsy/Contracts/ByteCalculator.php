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
     * Performs the memory calculation
     *
     * @return mixed
     */
    public function calculate($totalMemory, $memoryUnit);
}