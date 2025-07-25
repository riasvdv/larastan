<?php

namespace DateExtension;

use Illuminate\Support\Facades\Date;

use function PHPStan\Testing\assertType;

function test(mixed $date): void
{
    assertType('Illuminate\Support\Carbon', Date::create());
    assertType('Illuminate\Support\Carbon', Date::createFromDate());
    assertType('Illuminate\Support\Carbon', Date::createFromTime());
    assertType('Illuminate\Support\Carbon', Date::createFromTimeString('12:00'));
    assertType('Illuminate\Support\Carbon', Date::createFromTimestamp(0));
    assertType('Illuminate\Support\Carbon', Date::createFromTimestampMs(0));
    assertType('Illuminate\Support\Carbon', Date::createFromTimestampUTC(0));
    assertType('Illuminate\Support\Carbon', Date::createMidnightDate());
    assertType('Illuminate\Support\Carbon', Date::fromSerialized($date));
    assertType('Illuminate\Support\Carbon|null', Date::getTestNow());
    assertType('Illuminate\Support\Carbon', Date::instance($date));
    assertType('Illuminate\Support\Carbon', Date::now());
    assertType('Illuminate\Support\Carbon', Date::parse('12:00'));
    assertType('Illuminate\Support\Carbon', Date::today());
    assertType('Illuminate\Support\Carbon', Date::tomorrow());
    assertType('Illuminate\Support\Carbon', Date::yesterday());
    assertType('Illuminate\Support\Carbon|null', Date::createFromFormat('Y-m-d', '2022-01-01'));
    assertType('Illuminate\Support\Carbon|null', Date::createSafe());
    assertType('Illuminate\Support\Carbon|null', Date::make('today'));
}
