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

namespace App\Exception\Handler;

use App\Exception\ApiException;
use App\Kernel\Http\Response;
use Hyperf\Di\Annotation\Inject;
use Hyperf\ExceptionHandler\ExceptionHandler;
use Hyperf\HttpMessage\Stream\SwooleStream;
use Psr\Http\Message\ResponseInterface;
use Throwable;

class ApiExceptionHandler extends ExceptionHandler
{
    /**
     * @Inject
     * @var Response
     */
    protected $response;

    public function handle(Throwable $throwable, ResponseInterface $response)
    {
        // 阻止异常冒泡
        $this->stopPropagation();
        return $this->response->fail($throwable->getCode(), $throwable->getMessage());
    }

    public function isValid(Throwable $throwable): bool
    {
        return $throwable instanceof ApiException;
    }
}
