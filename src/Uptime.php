<?php
/**
 * Created by PhpStorm.
 * User: tomrouse
 * Date: 14/04/2017
 * Time: 20:34
 */

namespace Statsy;


class Uptime extends StatsyBase
{

    const FILE = '/proc/uptime';

    private $days;
    private $hours;
    private $mins;
    private $secs;


    private function getUptime()
    {
        $str   = @file_get_contents('/proc/uptime');
        $num   = floatval($str);

        $this->secs  = fmod($num, 60); $num = intdiv($num, 60);
        $this->mins  = $num % 60;         $num = intdiv($num, 60);
        $this->hours = $num % 24;         $num = intdiv($num, 24);
        $this->days  = $num;
    }


    public function days()
    {
        $this->getUptime();

        return $this->days . "&nbsp" . "Days" . "&nbsp";
    }


    public function hours()
    {
        $this->getUptime();

        return $this->days . "&nbsp" . "Days" . "&nbsp" .$this->hours . "&nbsp" . "Hours" . "&nbsp";
    }


    public function mins()
    {
        $this->getUptime();

        return $this->days . "&nbsp" . "Days" . "&nbsp" . $this->hours . "&nbsp" . "Hours" . "&nbsp" . $this->mins . "&nbsp" . "Mins" . "&nbsp";
    }


    public function secs()
    {
        $this->getUptime();

        return $this->days . "&nbsp" . "Days" . "&nbsp" . $this->hours . "&nbsp" . "Hours" . "&nbsp" . $this->mins . "&nbsp" . "Mins" . "&nbsp" . StatsyBase::round_up($this->secs, 0) . "&nbsp" . "Secs" . "&nbsp";
    }



}