<?php

declare(strict_types=1);

namespace App\Process\ConsumerProcess\AsyncQueue;

use Hyperf\AsyncQueue\Process\ConsumerProcess;
use Hyperf\Process\Annotation\Process;

/**
 * @Process()
 */
class RequestServer extends ConsumerProcess
{
    /**
     * @var string
     */
    protected $queue = 'reqeust_server';
}
