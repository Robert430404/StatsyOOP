<?php
/**
 * Created by PhpStorm.
 * User: tomrouse
 * Date: 10/04/2017
 * Time: 19:28
 */

namespace Statsy;

/**
 * Class StatsyBase
 *
 * @package Statsy
 */
abstract class StatsyBase
{
    /**
     * Performs a round on the seconds
     *
     * @param $value
     * @param $precision
     * @return float|int
     */
    protected function round_up ( $value, $precision )
    {
        $pow = pow ( 10, $precision );
        return ( ceil ( $pow * $value ) + ceil ( $pow * $value - ceil ( $pow * $value ) ) ) / $pow;
    }

    /**
     * @return mixed
     */
    public static function ip()
    {
        return $_SERVER['SERVER_ADDR'];
    }

}