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
        $this->usedPercent = $this->calculator->roundUp($this->used / $this->total * 100, 1);
    }

    /**
     * Returns the total disk space
     *
     * @return ByteCalculator
     */
    public function total()
    {
        return $this->calculator->calculate($this->total);
    }

    /**
     * Returns the free disk space
     *
     * @return ByteCalculator
     */
    public function free()
    {
        return $this->calculator->calculate($this->free);
    }

    /**
     * Returns the used disk space
     *
     * @return ByteCalculator
     */
    public function used()
    {
        return $this->calculator->calculate($this->used);
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