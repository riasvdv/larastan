<?php

namespace FacadesL1220;

use App\DummyFacade;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;

use function PHPStan\Testing\assertType;

function test(): void
{
    assertType('Illuminate\Support\Collection<(int|string), mixed>', Config::collection('foo.bar'));
}
