<?php

namespace Statsy;

use Statsy\Contracts\ByteCalculator;

/**
 * Class Memory
 *
 * @package Statsy
 */
class Memory
{
    /**
     * @var string
     */
    private $memoryFile;

    /**
     * @var Resource
     */
    private $handle;

    /**
     * @var ByteCalculator
     */
    private $calculator;

    /**
     * @var double
     */
    private $total;

    /**
     * @var double
     */
    private $free;

    /**
     * @var double
     */
    private $available;

    /**
     * @var double
     */
    private $buffer;

    /**
     * @var double
     */
    private $cached;

    /**
     * @var double
     */
    private $swap;

    /**
     * @var double
     */
    private $shMem;

    /**
     * @var double
     */
    private $sReclaimable;

    /**
     * @var double
     */
    private $sUnreclaim;

    /**
     * @var double
     */
    private $used;

    /**
     * @var double
     */
    private $usedPercent;

    /**
     * @var double
     */
    private $realFree;

    /**
     * Memory constructor.
     *
     * @param $memoryFile
     */
    public function __construct($memoryFile, ByteCalculator $memoryCalculator)
    {
        $this->memoryFile = $memoryFile;
        $this->handle     = file_exists($this->memoryFile) ? fopen($this->memoryFile, 'r') : 0;
        $this->calculator = $memoryCalculator;
    }

    /**
     * Parses the memory file and formats the data
     *
     * @return Memory
     */
    public function readMemoryFile()
    {
        $memoryString = stream_get_contents($this->handle);
        $memoryInfo   = explode("\n", $memoryString);

        foreach ($memoryInfo as &$memoryItem) {
            $memoryItem = (double)preg_replace('/\D/', '', $memoryItem);
        }

        $this->total        = $memoryInfo[0];
        $this->free         = $memoryInfo[1];
        $this->available    = $memoryInfo[2];
        $this->buffer       = $memoryInfo[3];
        $this->cached       = $memoryInfo[4];
        $this->swap         = $memoryInfo[14];
        $this->shMem        = $memoryInfo[20];
        $this->sReclaimable = $memoryInfo[22];
        $this->sUnreclaim   = $memoryInfo[23];
        $this->used         = $this->total - $this->free - $this->buffer - $this->cached - $this->sReclaimable + $this->shMem;
        $this->usedPercent  = $this->calculator->roundUp($this->used / $this->total * 100, 2);
        $this->realFree     = $this->total - $this->used;

        return $this;
    }

    /**
     * Returns the total memory for the system
     *
     * @param string $memoryValue
     * @return float|int
     */
    public function total($memoryValue = '')
    {
        return $this->calculator->calculate($this->total, $memoryValue);
    }

    /**
     * Returns the free memory for the system
     *
     * @param string $memoryValue
     * @return float|int
     */
    public function free($memoryValue = '')
    {
        return $this->calculator->calculate($this->free, $memoryValue);
    }

    /**
     * Returns the available memory for the system
     *
     * @param string $memoryValue
     * @return float|int
     */
    public function available($memoryValue = '')
    {
        return $this->calculator->calculate($this->available, $memoryValue);
    }

    /**
     * Returns the memory buffer for the system
     *
     * @param string $memoryValue
     * @return float|int
     */
    public function buffer($memoryValue = '')
    {
        return $this->calculator->calculate($this->buffer, $memoryValue);
    }

    /**
     * Returns the cached memory for the system
     *
     * @param string $memoryValue
     * @return float|int
     */
    public function cached($memoryValue = '')
    {
        return $this->calculator->calculate($this->cached, $memoryValue);
    }

    /**
     * Returns the swap in use by the system
     *
     * @param string $memoryValue
     * @return float|int
     */
    public function swap($memoryValue = '')
    {
        return $this->calculator->calculate($this->swap, $memoryValue);
    }

    /**
     * Returns the shared memory for the system
     *
     * @param string $memoryValue
     * @return float|int
     */
    public function shMem($memoryValue = '')
    {
        return $this->calculator->calculate($this->shMem, $memoryValue);
    }

    /**
     * Shows the shared reclaimable memory for the system
     *
     * @param string $memoryValue
     * @return float|int
     */
    public function sReclaimable($memoryValue = '')
    {
        return $this->calculator->calculate($this->sReclaimable, $memoryValue);
    }

    /**
     * Shows the shared unreclaimable memory for the system
     *
     * @param string $memoryValue
     * @return float|int
     */
    public function sUnreclaim($memoryValue = '')
    {
        return $this->calculator->calculate($this->sUnreclaim, $memoryValue);
    }

    /**
     * Shows the used memory in the system
     *
     * @param string $memoryValue
     * @return float|int
     */
    public function used($memoryValue = '')
    {
        return $this->calculator->calculate($this->used, $memoryValue);
    }

    /**
     * Shows the "real" free memory
     *
     * @param string $memoryValue
     * @return float|int
     */
    public function realFree($memoryValue = '')
    {
        return $this->calculator->calculate($this->realFree, $memoryValue);
    }

    /**
     * Returns a percentage representation of the memory used
     *
     * @return float
     */
    public function usedPercent()
    {
          return $this->usedPercent;
    }

    /**
     * Closes the file handler for memory
     */
    public function __destruct()
    {
        if (file_exists($this->memoryFile)) {
            fclose($this->handle);
        }
    }
}

