<?php

namespace Statsy\Utilities;

use Statsy\Contracts\ByteCalculator as ByteCalculatorInterface;

/**
 * Class MemoryCalculator
 *
 * @package Statsy\Utilities
 */
class ByteCalculator extends Calculator implements ByteCalculatorInterface
{
    /**
     * @param $totalMemory
     * @param $memoryUnit
     * @return float|int
     */
    public function calculate($totalMemory, $memoryUnit)
    {
        switch ($memoryUnit) {
            case 'mb' :
                $totalMemory = $this->convert($totalMemory, $memoryUnit);
                break;
            case 'gb' :
                $totalMemory = $this->convert($totalMemory, $memoryUnit);
        }

        return $totalMemory;
    }
}