<?php

namespace Statsy;

/**
 * Class Uptime
 *
 * This class is used to get the current uptime of the system. When you make use of this class
 * you have to pass the file path to your systems uptime file. You can then use our fluent
 * interface to access various pieces of the application.
 *
 * @package Statsy
 */
class Uptime extends StatsyBase
{
    /**
     * @var int
     */
    private $days;

    /**
     * @var int
     */
    private $hours;

    /**
     * @var int
     */
    private $minutes;

    /**
     * @var int
     */
    private $seconds;

    /**
     * @var string
     */
    private $uptimeFile;

    /**
     * @var Resource
     */
    private $handle;

    /**
     * Uptime constructor.
     *
     * @param $uptimeFile
     */
    public function __construct($uptimeFile)
    {
        $this->uptimeFile = $uptimeFile;
        $this->handle     = file_exists($this->uptimeFile) ? fopen($this->uptimeFile, 'r') : false;
    }

    /**
     * Gets the current uptime of the server
     *
     * @return Uptime
     */
    public function getUptime()
    {
        $str           = ($this->handle !== false) ? stream_get_contents($this->handle) : 0;
        $num           = (float)$str;
        $this->seconds = fmod($num, 60);
        $num           = intdiv($num, 60);
        $this->minutes = $num % 60;
        $num           = intdiv($num, 60);
        $this->hours   = $num % 24;
        $num           = intdiv($num, 24);
        $this->days    = $num;

        return $this;
    }

    /**
     * Returns a time string with the wanted information inside of it
     *
     * @param bool $days
     * @param bool $hours
     * @param bool $minutes
     * @param bool $seconds
     * @return string
     */
    public function getTimeString(
        $days    = true,
        $hours   = false,
        $minutes = false,
        $seconds = false
    ) {
        $timeString = ($days    === true) ? $this->days()                  : '';
        $timeString = ($hours   === true) ? $timeString . $this->hours()   : $timeString;
        $timeString = ($minutes === true) ? $timeString . $this->minutes() : $timeString;
        $timeString = ($seconds === true) ? $timeString . $this->seconds() : $timeString;

        return $timeString;
    }

    /**
     * Returns the days in string form
     *
     * @return string
     */
    private function days()
    {
        return $this->days . "&nbsp;" . "Days" . "&nbsp;";
    }

    /**
     * Returns the days in string form
     *
     * @return string
     */
    private function hours()
    {
        return $this->hours . "&nbsp;" . "Hours" . "&nbsp;";
    }

    /**
     * Returns the minuets in string form
     *
     * @return string
     */
    private function minutes()
    {
        return $this->minutes . "&nbsp;" . "Mins" . "&nbsp;";
    }

    /**
     * Returns the seconds in string form
     *
     * @return string
     */
    private function seconds()
    {
        return StatsyBase::round_up($this->seconds, 0) . "&nbsp;" . "Secs" . "&nbsp;";
    }

    /**
     * Closes the file handler for uptime
     */
    public function __destruct()
    {
        if (file_exists($this->uptimeFile)) {
            fclose($this->handle);
        }
    }
}