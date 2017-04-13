<?php
/**
 * Created by PhpStorm.
 * User: tomrouse
 * Date: 10/04/2017
 * Time: 16:02
 */


namespace Statsy;


class memory extends statsy
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
    private $usedpercent;
    private $realfree;


    function __construct()
    {
        $this->ReadMemoryFile();
    }


    protected function ReadMemoryFile()
    {
        $memoryValues = file($this::FILE);

        foreach ($memoryValues as &$memory_item) {
            $memory_item = preg_replace('/\D/', '', $memory_item);
        }

        $this->total = $memoryValues[0];
        $this->free = $memoryValues[1];
        $this->available = $memoryValues[2];
        $this->buffer = $memoryValues[3];
        $this->cached = $memoryValues[4];
        $this->swap = $memoryValues[14];
        $this->shmem = $memoryValues[20];
        $this->sreclaimable = $memoryValues[22];
        $this->sunreclaim = $memoryValues[23];
        $this->used = $this->total - $this->free - $this->buffer - $this->cached - $this->sreclaimable + $this->shmem;
        $this->usedpercent = statsy::round_up($this->used / $this->total * 100, 2);
        $this->realfree = $this->total - $this->used;

    }


    public function total($memoryValue)
    {
        $total_kb = $this->total;

        return statsy::returnCalculator($total_kb, $memoryValue);
    }


    public function free($memoryValue)
    {
        $free_kb = $this->free;

        return statsy::returnCalculator($free_kb, $memoryValue);
    }


    public function available($memoryValue)
    {
        $available_kb = $this->available;

        return statsy::returnCalculator($available_kb, $memoryValue);
    }

    public function buffer($memoryValue)
    {
        $buffer_kb = $this->buffer;

        return statsy::returnCalculator($buffer_kb, $memoryValue);
    }


    public function cached($memoryValue)
    {
        $cached_kb = $this->cached;

        return statsy::returnCalculator($cached_kb, $memoryValue);
    }


    public function swap($memoryValue)
    {
        $swap_kb = $this->swap;

        return statsy::returnCalculator($swap_kb, $memoryValue);
    }


    public function shmem($memoryValue)
    {
        $shmem_kb = $this->shmem;

        return statsy::returnCalculator($shmem_kb, $memoryValue);
    }


    public function sreclaimable($memoryValue)
    {
        $sreclaimable_kb = $this->sreclaimable;

        return statsy::returnCalculator($sreclaimable_kb, $memoryValue);
    }


    public function sunreclaim($memoryValue)
    {
        $sunreclaim_kb = $this->sunreclaim;

        return statsy::returnCalculator($sunreclaim_kb, $memoryValue);
    }


    public function used($memoryValue)
    {
        $used_kb = $this->used;

        return statsy::returnCalculator($used_kb, $memoryValue);
    }


    public function usedpercent($memoryValue)
    {
        $usedpercent_kb = $this->usedpercent;

        return statsy::returnCalculator($usedpercent_kb, $memoryValue);
    }


    public function realfree($memoryValue)
    {
        $realfree_kb = $this->realfree;

        return statsy::returnCalculator($realfree_kb, $memoryValue);
    }


}

