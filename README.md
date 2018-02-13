
#  PHP .NET Ticks

[![Build Status](https://travis-ci.org/DivineOmega/php-dot-net-ticks.svg?branch=master)](https://travis-ci.org/DivineOmega/php-dot-net-ticks)
[![Coverage Status](https://coveralls.io/repos/github/DivineOmega/php-dot-net-ticks/badge.svg?branch=master)](https://coveralls.io/github/DivineOmega/php-dot-net-ticks?branch=master)
[![StyleCI](https://styleci.io/repos/120622320/shield?branch=master)](https://styleci.io/repos/120622320)

This package helps PHP developers work with and convert .NET ticks, a form of precise time measurement used by the .NET `DateTime` object.

## Features

You can use this library to do the following, and more.

* Convert ticks to timestamp
* Convert ticks to `DateTime` object
* Convert ticks to `Carbon` date object
* Get the current time in ticks
* Convert timestamp to ticks

## What are .NET ticks?

> A single tick represents one hundred nanoseconds or one ten-millionth of a second. There are 10,000 ticks in a millisecond, or 10 million ticks in a second. 

> The value of this property [`DateTime.Ticks`] represents the number of 100-nanosecond intervals that have elapsed since 12:00:00 midnight, January 1, 0001 (0:00:00 UTC on January 1, 0001, in the Gregorian calendar), which represents DateTime.MinValue. It does not include the number of ticks that are attributable to leap seconds.

*Source: [.NET API Reference: DateTime.Tick Property](https://msdn.microsoft.com/en-us/library/system.datetime.ticks(v=vs.110).aspx)*


## Installation

The PHP .NET Ticks package can be easily installed using Composer. Just run the following command from the root of your project.

```
composer require divineomega/php-dot-net-ticks
```

If you have never used the Composer dependency manager before, head to the [Composer website](https://getcomposer.org/) for more information on how to get started.

## Usage

First you need to create a new `Ticks` object. This can be done in several ways.

```php
use DivineOmega\DotNetTicks\Ticks;

// Current time
$ticks = new Ticks();

// Specific time in ticks
$ticks = new Ticks(636536021491253348);

// From timestamp
$ticks = Ticks::createFromTimestamp(1518005349);
```

You can then call methods on the `Ticks` object to retrieve or convert as necessary.

```php
$ticks = $ticks->ticks();       // Ticks

$time = $ticks->timestamp();    // UNIX timstamp

$dateTime = $ticks->dateTime(); // PHP DateTime object
$carbon = $ticks->carbon();     // Carbon date object
```

If you wish, you can combine these two steps into one line, as shown in the examples below.

```php
// Get current time in ticks
$nowInTicks = (new Ticks())->ticks();

// Convert ticks to timestamp
$timestamp = (new Ticks(636536021491253348))->timestamp();

// Convert timestamp to ticks
$ticks = Ticks::createFromTimestamp(1518005349)->ticks();
```