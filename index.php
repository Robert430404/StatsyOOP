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
//Set the var $disk to create a new memory object
$memory = new memory();
$disk = new disk();
$cpu = new cpu();

echo 'Load';
echo '<br>';
echo $cpu->load();

echo '<br>';
echo 'UsedMem';
echo '<br>';
echo $memory->usedpercent();

