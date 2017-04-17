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


    private function readCpuFile()
    {
        $cpuFile = file($this::FILE);

        $this->model = strtr ($cpuFile[4], array ('model name	: ' => ''));
        $this->cores = strtr ($cpuFile[12], array ('cpu cores	: ' => ''));
        $this->clockSpeed = $this->round_up(strtr ($cpuFile[7], array ('cpu MHz		: ' => '')),2);
        $this->cache = strtr ($cpuFile[8], array ('cache size	: ' => ''));
    }


    private function getCpuLoad()
    {
        $this->load = sys_getloadavg()[1];
    }


    public function model()
    {
        $this->readCpuFile();

        return $this->model;
    }


    public function cores()
    {
        $this->readCpuFile();

        return $this->cores;
    }


    public function clockSpeed()
    {
        $this->readCpuFile();

        return $this->clockSpeed;
    }


    public function cache()
    {
        $this->readCpuFile();

        return $this->cache;
    }


    public function load()
    {
        $this->getCpuLoad();

        return $this->load;
    }

}