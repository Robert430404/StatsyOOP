<?php
/**
 * Created by PhpStorm.
 * User: tomrouse
 * Date: 10/04/2017
 * Time: 20:59
 */


$files = [
    'statsy',
    'memory',
    'disk'
];

foreach($files as $file){
    require_once($file . '.php');
}