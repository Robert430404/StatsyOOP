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
     * @param $input
     * @param $conversion
     * @return float|int
     */
    protected function convert($input, $conversion)
    {
        if ($conversion == 'mb') {
            $converted = $input / 1024;
            return $this->round_up($converted, 2);
        }
        else if ($conversion == 'gb') {
            $converted = $input / 1024 / 1024;
            return $this->round_up($converted, 2);
        }
    }

    /**
     * @param $dataValue
     * @param $memoryValue
     * @return float|int
     */
    protected function returnCalculator($dataValue, $memoryValue)
    {
        if ($memoryValue == '') {
            return $dataValue;
        }

        else if ($memoryValue == 'kb') {
            return $dataValue;
        }

        else if ($memoryValue == 'mb') {
            return $this->convert($dataValue, 'mb');
        }

        else if ($memoryValue == 'gb') {
            return $this->convert($dataValue, 'gb');
        }
    }

    /**
     * @return mixed
     */
    public static function ip()
    {
        return $_SERVER['SERVER_ADDR'];
    }

}