<?php
/*
 *
 *   JUST TESTING IN THIS FILE NOT PART OF STATSY
 *
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include 'src/Statsy.php';


use Statsy\Statsy;
use Statsy\Cpu;
use Statsy\Memory;
use Statsy\Disk;
use Statsy\Uptime;

$memory = new Memory();
$cpu = new Cpu();
$disk = new Disk();
$uptime = new Uptime();
$statsy = new Statsy($memory, $cpu, $disk, $uptime);


//now can use
echo $statsy->usedMem();
