<?php
/**
 * Created by PhpStorm.
 * User: tomrouse
 * Date: 16/04/2017
 * Time: 13:41
 */

namespace Statsy;


include 'autoload.php';

class statsyArray
{

    function __construct()
    {
        $this->data();
    }


    public function data()
    {
        $memory = new memory();
        $disk = new disk();

        $mem = array(
            'total' => $memory->total(),
        );

        $disk = array(
            'total' => $disk->total(),
        );

        $array = array(
            'mem' => $mem,
            'disk' => $disk
        );

        return json_encode($array);

    }

}

$stats = new statsyArray();

echo $stats->data();