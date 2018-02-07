<?php

use PHPUnit\Framework\TestCase;
use DivineOmega\DotNetTicks\Ticks;

class DotNetTicksTest extends TestCase
{
    public function testConstructionWithCurrentTime()
    {
        $expected = (time() * Ticks::TICKS_TIMESTAMP_MULTIPLIER) + Ticks::EPOCH_OFFSET_IN_TICKS;
        $ticks = (new Ticks())->ticks();

        $this->assertEquals($expected, $ticks);
    }

    public function testConstructionWithSpecificTicksValue()
    {
        $ticksValue = 636536021491253348;

        $expected = $ticksValue;
        $ticks = (new Ticks($ticksValue))->ticks();

        $this->assertEquals($expected, $ticks);
    }

    public function testGetTimestampFromCurrentTime()
    {
        $expected = time();
        $timestamp = (new Ticks())->timestamp();

        $this->assertEquals($expected, $timestamp);
    }

    public function testGetTimestampFromSpecificTicksValue()
    {
        $ticksValue = 636536021491253348;

        $expected = 1518005349.1253347;
        $timestamp = (new Ticks($ticksValue))->timestamp();

        $this->assertEquals($expected, $timestamp);
    }
}