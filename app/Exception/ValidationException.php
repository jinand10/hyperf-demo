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

namespace App\Exception;

use App\Constants\ApiCode;
use Hyperf\Server\Exception\ServerException;
use Throwable;

class ValidationException extends ServerException
{
    public function __construct(string $message = null, int $code = 0, Throwable $previous = null)
    {
        $code = $code ?: ApiCode::PARAMS_ERROR;
        parent::__construct($message, $code, $previous);
    }
}
