<?php
/**
 * Created by PhpStorm.
 * User: tomrouse
 * Date: 13/04/2017
 * Time: 13:32
 */

namespace Statsy;


class disk extends statsy
{

    const DISK = '/';

    private $total;
    private $free;
    private $used;
    private $usedpercent;


    function __construct()
    {
        $this->getDiskInfo();
    }


    private function getDiskInfo()
    {

        $this->total = disk_total_space("/");
//        $this->free = disk_free_space($this::DISK);
//        $this->used = $this->total - $this->free;
//        $this->usedpercent = statsy::round_up($this->used / $this->total * 100, 2);

    }


    public function total($memoryValue)
    {
        $total_kb = $this->total;

        return statsy::returnCalculator($total_kb, $memoryValue);
    }


}