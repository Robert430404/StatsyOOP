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
    //Memory Functions

    public function totalMem($memoryValue = '')
    {
        $memory = new Memory();
        return $memory->total($memoryValue);
    }


    public function freeMem($memoryValue = '')
    {
        $memory = new Memory();
        return $memory->free($memoryValue);
    }


    public function availableMem($memoryValue = '')
    {
        $memory = new Memory();
        return $memory->available($memoryValue);
    }


    public function bufferMem($memoryValue = '')
    {
        $memory = new Memory();
        return $memory->buffer($memoryValue);
    }


    public function cachedMem($memoryValue = '')
    {
        $memory = new Memory();
        return $memory->cached($memoryValue);
    }


    public function swapMem($memoryValue = '')
    {
        $memory = new Memory();
        return $memory->swap($memoryValue);
    }


    public function shMem($memoryValue = '')
    {
        $memory = new Memory();
        return $memory->shmem($memoryValue);
    }


    public function sreclaimableMem($memoryValue = '')
    {
        $memory = new Memory();
        return $memory->sreclaimable($memoryValue);
    }


    public function sunreclaimMem($memoryValue = '')
    {
        $memory = new Memory();
        return $memory->sunreclaim($memoryValue);
    }


    public function usedMem($memoryValue = '')
    {
        $memory = new Memory();
        return $memory->used($memoryValue);
    }


    public function usedMemPercent()
    {
        $memory = new Memory();
        return $memory->usedPercent();
    }


    public function realFreeMem($memoryValue = '')
    {
        $memory = new Memory();
        return $memory->realFree($memoryValue);
    }

    //Disk Functions

    public function totalDisk($memoryValue = '')
    {
        $disk = new Disk();
        return $disk->total($memoryValue);
    }


    public function freeDisk($memoryValue = '')
    {
        $disk = new Disk();
        return $disk->free($memoryValue);
    }


    public function usedDisk($memoryValue = '')
    {
        $disk = new Disk();
        return $disk->used($memoryValue);
    }


    public function usedDiskPercent()
    {
        $disk = new Disk();
        return $disk->usedPercent();
    }

    //CPU Functions

    public function cpuModel()
    {
        $cpu = new Cpu();
        return $cpu->model();
    }


    public function cpuCores()
    {
        $cpu = new Cpu();
        return $cpu->cores();
    }


    public function cpuClockSpeed()
    {
        $cpu = new Cpu();
        return $cpu->clockSpeed();
    }


    public function cpuCache()
    {
        $cpu = new Cpu();
        return $cpu->cache();
    }


    public function cpuLoad()
    {
        $cpu = new Cpu();
        return $cpu->load();
    }

    //Uptime Functions

    public function uptimeDays()
    {
        $uptime = new Uptime();
        return $uptime->days();
    }


    public function uptimeHours()
    {
        $uptime = new Uptime();
        return $uptime->hours();
    }


    public function uptimeMins()
    {
        $uptime = new Uptime();
        return $uptime->mins();
    }


    public function uptimeSecs()
    {
        $uptime = new Uptime();
        return $uptime->secs();
    }

    //Ip

    public function ip()
    {
        return Statsy::ip();
    }



}

$statsy = new Statsy();