<?php
/**
 * Created by PhpStorm.
 * User: tomrouse
 * Date: 13/04/2017
 * Time: 13:32
 */

namespace Statsy;


class Disk extends StatsyBase
{

    const DISK = '/';

    private $total;
    private $free;
    private $used;
    private $usedPercent;


    private function getTotalDisk()
    {
        $this->total = disk_total_space(self::DISK) / 1024;
    }


    private function getFreeDisk()
    {
        $this->free = disk_free_space(self::DISK) / 1024;
    }


    private function getUsedDisk()
    {
        $this->getTotalDisk();
        $this->getFreeDisk();

        $this->used = $this->total - $this->free;
    }


    private function getUsedPercentDisk()
    {
        $this->getTotalDisk();
        $this->getUsedDisk();

        $this->usedPercent = $this->round_up($this->used / $this->total * 100, 1);
    }


    public function total($memoryValue = '')
    {
        $this->getTotalDisk();

        return $this->returnCalculator($this->total, $memoryValue);
    }


    public function free($memoryValue = '')
    {
        $this->getFreeDisk();

        return $this->returnCalculator($this->free, $memoryValue);
    }


    public function used($memoryValue = '')
    {
        $this->getUsedDisk();

        return $this->returnCalculator($this->used, $memoryValue);
    }


    public function usedPercent()
    {
        $this->getUsedPercentDisk();

        return $this->usedPercent;
    }


}