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

namespace App\Constants;

use Hyperf\Constants\AbstractConstants;
use Hyperf\Constants\Annotation\Constants;

/**
 * @Constants
 */
class ApiCode extends AbstractConstants
{
    /**
     * @Message("SUCCESS")
     */
    const SUCCESS = 1;

    /**
     * @Message("服务器正在维护，稍后再试~")
     */
    const SERVER_ERROR = 500;

    /**
     * @Message("数据不存在")
     */
    const NOT_FOUND = 404;

    /**
     * @Message("签名错误")
     */
    const SIGN_ERROR = 700;

    /**
     * @Message("参数错误")
     */
    const PARAMS_ERROR = 701;

    /**
     * @Message("新增失败")
     */
    const INSERT_FAILED = 10001;

    /**
     * @Message("更新失败")
     */
    const UPDATE_FAILED = 10002;

    /**
     * @Message("删除失败")
     */
    const DELETE_FAILED = 10003;
}
