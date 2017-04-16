<?php
/**
 * Created by PhpStorm.
 * User: tomrouse
 * Date: 10/04/2017
 * Time: 16:02
 */


namespace Statsy;


class Memory extends StatsyBase
{

    const FILE = '/proc/meminfo';

    private $total;
    private $free;
    private $available;
    private $buffer;
    private $cached;
    private $swap;
    private $shmem;
    private $sreclaimable;
    private $sunreclaim;
    private $used;
    private $usedPercent;
    private $realFree;


    function __construct()
    {
        $this->readMemoryFile();
    }


    private function readMemoryFile()
    {
        $memoryValues = file($this::FILE);

        foreach ($memoryValues as &$memory_item) {
            $memory_item = preg_replace('/\D/', '', $memory_item);
        }

        $this->total = (double)$memoryValues[0];
        $this->free = (double)$memoryValues[1];
        $this->available = (double)$memoryValues[2];
        $this->buffer = (double)$memoryValues[3];
        $this->cached = (double)$memoryValues[4];
        $this->swap = (double)$memoryValues[14];
        $this->shmem = (double)$memoryValues[20];
        $this->sreclaimable = (double)$memoryValues[22];
        $this->sunreclaim = (double)$memoryValues[23];
        $this->used = $this->total - $this->free - $this->buffer - $this->cached - $this->sreclaimable + $this->shmem;
        $this->usedPercent = StatsyBase::round_up($this->used / $this->total * 100, 2);
        $this->realFree = $this->total - $this->used;
    }


    public function total($memoryValue = '')
    {
        $total_kb = $this->total;

        return StatsyBase::returnCalculator($total_kb, $memoryValue);
    }


    public function free($memoryValue = '')
    {
        $free_kb = $this->free;

        return StatsyBase::returnCalculator($free_kb, $memoryValue);
    }


    public function available($memoryValue = '')
    {
        $available_kb = $this->available;

        return StatsyBase::returnCalculator($available_kb, $memoryValue);
    }

    public function buffer($memoryValue = '')
    {
        $buffer_kb = $this->buffer;

        return StatsyBase::returnCalculator($buffer_kb, $memoryValue);
    }


    public function cached($memoryValue = '')
    {
        $cached_kb = $this->cached;

        return StatsyBase::returnCalculator($cached_kb, $memoryValue);
    }


    public function swap($memoryValue = '')
    {
        $swap_kb = $this->swap;

        return StatsyBase::returnCalculator($swap_kb, $memoryValue);
    }


    public function shmem($memoryValue = '')
    {
        $shmem_kb = $this->shmem;

        return StatsyBase::returnCalculator($shmem_kb, $memoryValue);
    }


    public function sreclaimable($memoryValue = '')
    {
        $sreclaimable_kb = $this->sreclaimable;

        return StatsyBase::returnCalculator($sreclaimable_kb, $memoryValue);
    }


    public function sunreclaim($memoryValue = '')
    {
        $sunreclaim_kb = $this->sunreclaim;

        return StatsyBase::returnCalculator($sunreclaim_kb, $memoryValue);
    }


    public function used($memoryValue = '')
    {
        $used_kb = $this->used;

        return StatsyBase::returnCalculator($used_kb, $memoryValue);
    }


    public function usedPercent()
    {
          return $this->usedPercent;
    }


    public function realFree($memoryValue = '')
    {
        $realfree_kb = $this->realFree;

        return StatsyBase::returnCalculator($realfree_kb, $memoryValue);
    }


}

