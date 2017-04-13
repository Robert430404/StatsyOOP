<?php

//Include file where all class includes are
include 'autoload.php';
//Set namespace
use Statsy\memory;
//Set the var $disk to create a new memory object
$memory = new memory();


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