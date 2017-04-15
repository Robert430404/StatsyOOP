<?php
/**
 * Created by PhpStorm.
 * User: tomrouse
 * Date: 14/04/2017
 * Time: 20:32
 */

namespace Statsy;


class cpu extends statsy
{

    const FILE = '/proc/cpuinfo';

    private $model;
    private $cores;
    private $clockSpeed;
    private $cache;

    function __construct()
    {
        $this->readCpuFile();
    }


    private function readCpuFile()
    {
        $cpuFile = file($this::FILE);

        $this->model = strtr ($cpuFile[4], array ('model name	: ' => ''));
        $this->cores = strtr ($cpuFile[12], array ('cpu cores	: ' => ''));
        $this->clockSpeed = statsy::round_up(strtr ($cpuFile[7], array ('cpu MHz		: ' => '')),2);
        $this->cache = strtr ($cpuFile[8], array ('cache size	: ' => ''));
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
        return sys_getloadavg()[1];
    }

}