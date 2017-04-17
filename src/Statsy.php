<?php
/**
 * Created by PhpStorm.
 * User: tomrouse
 * Date: 16/04/2017
 * Time: 16:06
 */

namespace Statsy;

include 'autoload.php';


class Statsy
{

    protected $memory;
    protected $disk;
    protected $cpu;
    protected $uptime;


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
        return $this->uptime->days();
    }


    public function uptimeHours()
    {
        return $this->uptime->hours();
    }


    public function uptimeMins()
    {
        return $this->uptime->mins();
    }


    public function uptimeSecs()
    {
        return $this->uptime->secs();
    }

    //Ip

    public function ip()
    {
        return Statsy::ip();
    }



}
