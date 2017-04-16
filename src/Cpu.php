<?php
/**
 * Created by PhpStorm.
 * User: tomrouse
 * Date: 14/04/2017
 * Time: 20:32
 */

namespace Statsy;


class Cpu extends StatsyBase
{

    const FILE = '/proc/cpuinfo';

    private $model;
    private $cores;
    private $clockSpeed;
    private $cache;
    private $load;

    function __construct()
    {
        $this->readCpuFile();
        $this->getCpuLoad();
    }


    private function readCpuFile()
    {
        $cpuFile = file($this::FILE);

        $this->model = strtr ($cpuFile[4], array ('model name	: ' => ''));
        $this->cores = strtr ($cpuFile[12], array ('cpu cores	: ' => ''));
        $this->clockSpeed = StatsyBase::round_up(strtr ($cpuFile[7], array ('cpu MHz		: ' => '')),2);
        $this->cache = strtr ($cpuFile[8], array ('cache size	: ' => ''));
    }


    private function getCpuLoad()
    {
        $this->load = sys_getloadavg()[1];
    }


    public function model()
    {
        return $this->model;
    }


    public function cores()
    {
        return $this->cores;
    }


    public function clockSpeed()
    {
        return $this->clockSpeed;
    }


    public function cache()
    {
        return $this->cache;
    }


    public function load()
    {
        return $this->load;
    }

}