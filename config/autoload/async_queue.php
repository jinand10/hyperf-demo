<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf-cloud/hyperf/blob/master/LICENSE
 */

return [
    /**
     * 请求游戏服务端队列
     */
    'reqeust_server' => [
        'driver' => App\Kernel\AsyncQueue\Driver\RedisDriver::class,
        'channel' => 'request:server',
        'timeout' => 2,
        'retry_seconds' => 5,
        'handle_timeout' => 10,
        'processes' => env('PROCESS_NUM_REQUEST_SERVER', 1),
        'redis_pool' => 'async_queue',
    ],
];
