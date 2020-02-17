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

namespace App\Model;

use App\Kernel\Database\DataCacheTrait;
use App\Kernel\Database\QueryBuilder;
use App\Service\AdminCaller\Cache\RefreshService;
use Hyperf\DbConnection\Model\Model as BaseModel;
use Hyperf\ModelCache\Cacheable;
use Hyperf\ModelCache\CacheableInterface;
use Hyperf\Utils\ApplicationContext;

abstract class Model extends BaseModel implements CacheableInterface
{
    use Cacheable;
    //数据缓存
    use DataCacheTrait;

    /**
     * 获取自定义QueryBuilder
     * @return QueryBuilder
     */
    public function getModel()
    {
        /** @var QueryBuilder $model */
        $model = static::query();
        return $model;
    }

    /**
     * 获取连接句柄
     *
     * @author Jin<jinand10@163.com> 2020-01-15
     * @return void
     */
    public function connectionPool()
    {
        return $this->connection;
    }

    /**
     * 获取SQL表名
     *
     * @author Jin<jinand10@163.com> 2020-01-15
     * @return string
     */
    public function getTableName(): string
    {
        return config("databases.{$this->connection}.prefix") . $this->getTable();
    }
}
