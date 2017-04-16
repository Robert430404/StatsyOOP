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


    function __construct()
    {
        $this->getDiskInfo();
    }


    private function getDiskInfo()
    {

        $this->total = disk_total_space($this::DISK) / 1024;
        $this->free = disk_free_space($this::DISK) / 1024;
        $this->used = $this->total - $this->free;
        $this->usedPercent = StatsyBase::round_up($this->used / $this->total * 100, 1);

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


    public function used($memoryValue = '')
    {
        $used_kb = $this->used;

        return StatsyBase::returnCalculator($used_kb, $memoryValue);
    }


    public function usedPercent()
    {
        return $this->usedPercent;
    }


}