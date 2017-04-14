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
//Set the var $disk to create a new memory object
$memory = new memory();
$disk = new disk();

//Start using methods from the class
echo 'Total Memory (MB)';
echo '<br>';
echo $memory->used('mb');
echo '<br>';
echo '<br>';
echo 'Total Memory (KB)';
echo '<br>';
echo $memory->total('kb');
echo '<br>';
echo 'Total Memory (MB)';
echo '<br>';
echo $memory->total('mb');
echo '<br>';
echo 'Total Memory (GB)';
echo '<br>';
echo $memory->total('gb');
echo '<br>';
echo '<br>';
echo 'Free Memory (KB)';
echo '<br>';
echo $memory->free('kb');
echo '<br>';
echo 'Free Memory (MB)';
echo '<br>';
echo $memory->free('mb');
echo '<br>';
echo 'Free Memory (GB)';
echo '<br>';
echo $memory->free('gb');
echo '<br>';
echo '<br>';
echo 'Total Disk (GB)';
echo '<br>';
echo $disk->total('gb');
echo '<br>';
echo 'TESTING';
echo '<br>';
echo disk_total_space('/');