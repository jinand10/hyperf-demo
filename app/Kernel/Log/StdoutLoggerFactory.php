<?php
declare(strict_types=1);

namespace App\Kernel\Log;

use Psr\Container\ContainerInterface;

/**
 * Class StdoutLoggerFactory
 * @author jin <jinand10@163.com>
 */
class StdoutLoggerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        return logger('system');
    }
}
