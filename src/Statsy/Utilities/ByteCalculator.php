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
     * @var
     */
    private $kb;

    /**
     * @var
     */
    private $mb;

    /**
     * @var
     */
    private $gb;

    /**
     * @param $totalMemory
     * @param $memoryUnit
     * @return ByteCalculator
     */
    public function calculate($totalMemory)
    {
        $this->kb = $totalMemory;
        $this->mb = $this->convert($totalMemory, 'mb');
        $this->gb = $this->convert($totalMemory, 'gb');

        return $this;
    }

    /**
     * Returns a KiloByte representation of the value
     *
     * @return mixed
     */
    public function kb()
    {
        return $this->kb;
    }

    /**
     * Returns a MegaByte representation of the value
     *
     * @return mixed
     */
    public function mb()
    {
        return $this->mb;
    }

    /**
     * Returns a GigaByte representation of the value
     *
     * @return mixed
     */
    public function gb()
    {
        return $this->gb;
    }
}