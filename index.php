<?php
/*
 *
 *   JUST TESTING IN THIS FILE NOT PART OF STATSY
 *
 */


//Include file where all class includes are
include 'src/autoload.php';
//Set namespace
use Statsy\memory;
use Statsy\disk;
use Statsy\cpu;
use Statsy\uptime;
//Set the var $disk to create a new memory object
$memory = new memory();
$disk = new disk();
$cpu = new cpu();
$uptime = new uptime();

echo $uptime->days();
echo '<br>';
echo $uptime->hours();
echo '<br>';
echo $uptime->mins();
echo '<br>';
echo $uptime->secs();
