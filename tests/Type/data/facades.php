<?php

namespace Facades;

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
    assertType('Illuminate\Http\Request', Request::instance());

    assertType('null', Event::assertDispatched('FooEvent'));
    assertType('null', Event::assertDispatchedTimes('FooEvent', 5));
    assertType('null', Event::assertNotDispatched('FooEvent'));

    $redis = Redis::connection();
    assertType('(array<mixed>|Redis|false)', $redis->lrange('some-key', 0, -1));
    assertType('(array<mixed>|Redis|false)', Redis::lrange('some-key', 0, -1));
    assertType('(bool|Redis)', Redis::expire('foo', 3));
    assertType('(array<string, mixed>|Redis|false)', Redis::hmget('h', ['field1', 'field2']));

    assertType('Illuminate\Database\Query\Builder', DB::query());
    assertType('int', DB::transactionLevel());

    assertType('null', Queue::createPayloadUsing(function () {
    }));

    assertType('Psr\Log\LoggerInterface', Log::getLogger());

    assertType('Illuminate\Filesystem\FilesystemAdapter', Storage::disk());
    assertType('Illuminate\Filesystem\FilesystemAdapter', Storage::drive());
    assertType('Illuminate\Filesystem\FilesystemAdapter', Storage::cloud());
    assertType('bool', Storage::disk()->deleteDirectory('foo'));
    assertType('bool', Storage::drive()->deleteDirectory('foo'));
    assertType('bool', Storage::cloud()->deleteDirectory('foo'));
    assertType('string|false', Storage::putFile('foo', 'foo/bar'));
    assertType('mixed', Redis::get('foo'));
    assertType('mixed', Redis::client());

    assertType('string', DummyFacade::foo());
    assertType('int', DummyFacade::bar());
}
