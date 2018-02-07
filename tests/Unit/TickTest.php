<?php

use PHPUnit\Framework\TestCase;
use DivineOmega\DotNetTicks\Ticks;
use DateTime;
use Carbon\Carbon;

class DotNetTicksTest extends TestCase
{
    public function testGetTicksFromCurrentTime()
    {
        $expected = (time() * Ticks::TICKS_TIMESTAMP_MULTIPLIER) + Ticks::EPOCH_OFFSET_IN_TICKS;
        $ticks = (new Ticks())->ticks();

        $this->assertEquals($expected, $ticks);
    }

    public function testGetTicksFromSpecificTicksValue()
    {
        $ticksValue = 636536021491253348;

        $expected = $ticksValue;
        $ticks = (new Ticks($ticksValue))->ticks();

        $this->assertEquals($expected, $ticks);
    }

    public function testGetTimestampFromSpecificTicksValue()
    {
        $ticksValue = 636536021491253348;

        $expected = 1518005349.1253347;
        $timestamp = (new Ticks($ticksValue))->timestamp();

        $this->assertEquals($expected, $timestamp);
    }
    
    public function testGetDateTimeFromSpecificTicksValue()
    {
        $ticksValue = 636536021491253348;

        $expected = new DateTime('@1518005349');
        $dateTime = (new Ticks($ticksValue))->datetime();

        $this->assertEquals($expected, $dateTime);
    }

    public function testGetCarbonFromSpecificTicksValue()
    {
        $ticksValue = 636536021491253348;

        $expected = Carbon::createFromTimestampUTC(1518005349);
        $carbon = (new Ticks($ticksValue))->carbon();

        $this->assertEquals($expected, $carbon);
    }

    public function testCreateFromTimestamp()
    {
        $expected = 636536021490000000;

        $ticks = Ticks::createFromTimestamp(1518005349)->ticks();

        $this->assertEquals($expected, $ticks);
    }
}