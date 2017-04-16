<?php
/*
 *
 *   JUST TESTING IN THIS FILE NOT PART OF STATSY
 *
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//Include file where all class includes are
//include 'src/autoload.php';
////Set namespace
//use Statsy\Memory;
//use Statsy\Disk;
//use Statsy\Cpu;
//use Statsy\Uptime;
//////Set the var $disk to create a new memory object
//$memory = new Memory();
//$disk = new Disk();
//$cpu = new Cpu();
//$uptime = new Uptime();

include 'src/Statsy.php';

//use Statsy\Statsy;
//
//$statsy = new Statsy();


echo $statsy->totalMem('gb');

