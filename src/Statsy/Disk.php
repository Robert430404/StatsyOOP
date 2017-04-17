<?php

namespace Statsy;

use Statsy\Contracts\ByteCalculator;

/**
 * Class Disk
 *
 * @package Statsy
 */
class Disk extends StatsyBase
{
    /**
     * @var string
     */
    private $driveRoot;

    /**
     * @var ByteCalculator
     */
    private $calculator;

    /**
     * @var float|int
     */
    private $total;

    /**
     * @var float|int
     */
    private $free;

    /**
     * @var float|int
     */
    private $used;

    /**
     * @var float|int
     */
    private $usedPercent;

    /**
     * Disk constructor.
     *
     * @param $driveRoot
     */
    public function __construct($driveRoot, ByteCalculator $byteCalculator)
    {
        $this->driveRoot   = $driveRoot;
        $this->calculator  = $byteCalculator;
        $this->total       = disk_total_space($this->driveRoot) / 1024;
        $this->free        = disk_free_space($this->driveRoot) / 1024;
        $this->used        = $this->total - $this->free;
        $this->usedPercent = $this->round_up($this->used / $this->total * 100, 1);
    }

    /**
     * Returns the total disk space
     *
     * @param string $memoryValue
     * @return mixed
     */
    public function total($memoryValue = '')
    {
        return $this->calculator->calculate($this->total, $memoryValue);
    }

    /**
     * Returns the free disk space
     *
     * @param string $memoryValue
     * @return mixed
     */
    public function free($memoryValue = '')
    {
        return $this->calculator->calculate($this->free, $memoryValue);
    }

    /**
     * Returns the used disk space
     *
     * @param string $memoryValue
     * @return mixed
     */
    public function used($memoryValue = '')
    {
        return $this->calculator->calculate($this->used, $memoryValue);
    }

    /**
     * Returns the unused disk space in a percentage
     *
     * @return float|int
     */
    public function usedPercent()
    {
        return $this->usedPercent;
    }
}