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

use App\Constants\ApiCode;
use App\Kernel\Http\Response;
use Hyperf\Di\Annotation\Inject;
use Hyperf\ExceptionHandler\ExceptionHandler;
use Psr\Http\Message\ResponseInterface;
use Throwable;

class AppExceptionHandler extends ExceptionHandler
{
    /**
     * @Inject
     * @var Response
     */
    protected $response;

    public function handle(Throwable $throwable, ResponseInterface $response)
    {
        $msg = sprintf('%s in %s(%s)', $throwable->getMessage(), $throwable->getFile(), $throwable->getLine());
        $trace = $throwable->getTraceAsString();
        if (config('app_env') == 'local') {
            stdoutLogger()->error($msg);
            stdoutLogger()->error($trace);
        } else {
            logger()->error($msg);
            logger()->error($trace);
        }
        // 阻止异常冒泡
        $this->stopPropagation();
        return $this->response->fail(ApiCode::SERVER_ERROR, ApiCode::getMessage(ApiCode::SERVER_ERROR));
    }

    public function isValid(Throwable $throwable): bool
    {
        return true;
    }
}
