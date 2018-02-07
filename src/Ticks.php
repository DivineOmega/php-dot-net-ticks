<?php

namespace DivineOmega\DotNetTicks;

use DateTime;
use Carbon\Carbon;

class Ticks
{   
    const EPOCH_OFFSET_IN_TICKS = 621355968000000000;
    const TICKS_TIMESTAMP_MULTIPLIER = 10000000;

    private $ticks;

    public function __construct($ticks = null)
    {
        if ($ticks===null) {
            $this->ticks = self::currentTimeInTicks();
            return;
        }

        $this->ticks = $ticks;
    }

    public static function createFromTimestamp($timestamp)
    {
        return new self(self::getTicksFromTimestamp($timestamp));
    }

    private static function currentTimeInTicks()
    {
        return self::getTicksFromTimestamp(time());
    }

    private static function getTicksFromTimestamp($timestamp)
    {
        return (($timestamp * self::TICKS_TIMESTAMP_MULTIPLIER) + self::EPOCH_OFFSET_IN_TICKS);
    }

    public function ticks()
    {
        return $this->ticks;
    }

    public function timestamp()
    {
        return (($this->ticks - self::EPOCH_OFFSET_IN_TICKS) / self::TICKS_TIMESTAMP_MULTIPLIER);
    }

    public function dateTime()
    {
        return new DateTime('@'.floor($this->timestamp()));
    }

    public function carbon()
    {
        return Carbon::createFromTimestampUTC(floor($this->timestamp()));
    }

}