<?php

namespace Statsy;

include 'autoload.php';

/**
 * Class Statsy
 *
 * @package Statsy
 */
class Statsy
{
    /**
     * @var Memory
     */
    protected $memory;

    /**
     * @var Disk
     */
    protected $disk;

    /**
     * @var Cpu
     */
    protected $cpu;

    /**
     * @var Uptime
     */
    protected $uptime;

    /**
     * Statsy constructor.
     *
     * @param Memory $memory
     * @param Cpu $cpu
     * @param Disk $disk
     * @param Uptime $uptime
     */
    public function __construct(Memory $memory, Cpu $cpu, Disk $disk, Uptime $uptime)
    {
        $this->memory = $memory;
        $this->disk = $disk;
        $this->cpu = $cpu;
        $this->uptime = $uptime;
    }

    //Memory Functions

    public function totalMem($memoryValue = '')
    {
        return $this->memory->total($memoryValue);
    }


    public function freeMem($memoryValue = '')
    {
        return $this->memory->free($memoryValue);
    }


    public function availableMem($memoryValue = '')
    {
        return $this->memory->available($memoryValue);
    }


    public function bufferMem($memoryValue = '')
    {
        return $this->memory->buffer($memoryValue);
    }


    public function cachedMem($memoryValue = '')
    {
        return $this->memory->cached($memoryValue);
    }


    public function swapMem($memoryValue = '')
    {
        return $this->memory->swap($memoryValue);
    }


    public function shMem($memoryValue = '')
    {
        return $this->memory->shmem($memoryValue);
    }


    public function sreclaimableMem($memoryValue = '')
    {
        return $this->memory->sreclaimable($memoryValue);
    }


    public function sunreclaimMem($memoryValue = '')
    {
        return $this->memory->sunreclaim($memoryValue);
    }


    public function usedMem($memoryValue = '')
    {
        return $this->memory->used($memoryValue);
    }


    public function realFreeMem($memoryValue = '')
    {
        return $this->memory->realFree($memoryValue);
    }


    public function usedMemPercent()
    {
        return $this->memory->usedPercent();
    }

    //Disk Functions

    public function totalDisk($memoryValue = '')
    {
        return $this->disk->total($memoryValue);
    }


    public function freeDisk($memoryValue = '')
    {
        return $this->disk->free($memoryValue);
    }


    public function usedDisk($memoryValue = '')
    {
        return $this->disk->used($memoryValue);
    }


    public function usedDiskPercent()
    {
        return $this->disk->usedPercent();
    }

    //CPU Functions

    public function cpuModel()
    {
        return $this->cpu->model();
    }


    public function cpuCores()
    {
        return $this->cpu->cores();
    }


    public function cpuClockSpeed()
    {
        return $this->cpu->clockSpeed();
    }


    public function cpuCache()
    {
        return $this->cpu->cache();
    }


    public function cpuLoad()
    {
        return $this->cpu->load();
    }

    //Uptime Functions

    public function uptimeDays()
    {
        return $this->uptime->getUptime()->getTimeString();
    }


    public function uptimeHours()
    {
        return $this->uptime->getUptime()->getTimeString(true, true);
    }


    public function uptimeMinutes()
    {
        return $this->uptime->getUptime()->getTimeString(true, true, true);
    }


    public function uptimeSeconds()
    {
        return $this->uptime->getUptime()->getTimeString(true, true, true, true);
    }

    //Ip

    public function ip()
    {
        return Statsy::ip();
    }



}
