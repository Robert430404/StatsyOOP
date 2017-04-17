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


    private function readMemoryFile()
    {
        $memoryValues = file(self::FILE);

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
        $this->usedPercent = $this->round_up($this->used / $this->total * 100, 2);
        $this->realFree = $this->total - $this->used;
    }


    public function total($memoryValue = '')
    {
        $this->readMemoryFile();

        return $this->returnCalculator($this->total, $memoryValue);
    }


    public function free($memoryValue = '')
    {
        $this->readMemoryFile();

        return $this->returnCalculator($this->free, $memoryValue);
    }


    public function available($memoryValue = '')
    {
        $this->readMemoryFile();

        return $this->returnCalculator($this->available, $memoryValue);
    }

    public function buffer($memoryValue = '')
    {
        $this->readMemoryFile();

        return $this->returnCalculator($this->buffer, $memoryValue);
    }


    public function cached($memoryValue = '')
    {
        $this->readMemoryFile();

        return $this->returnCalculator($this->cached, $memoryValue);
    }


    public function swap($memoryValue = '')
    {
        $this->readMemoryFile();

        return $this->returnCalculator($this->swap, $memoryValue);
    }


    public function shmem($memoryValue = '')
    {
        $this->readMemoryFile();

        return $this->returnCalculator($this->shmem, $memoryValue);
    }


    public function sreclaimable($memoryValue = '')
    {
        $this->readMemoryFile();

        return $this->returnCalculator($this->sreclaimable, $memoryValue);
    }


    public function sunreclaim($memoryValue = '')
    {
        $this->readMemoryFile();

        return $this->returnCalculator($this->sunreclaim, $memoryValue);
    }


    public function used($memoryValue = '')
    {
        $this->readMemoryFile();

        return $this->returnCalculator($this->used, $memoryValue);
    }


    public function realFree($memoryValue = '')
    {
        $this->readMemoryFile();

        return $this->returnCalculator($this->realFree, $memoryValue);
    }


    public function usedPercent()
    {
          return $this->usedPercent;
    }


}

