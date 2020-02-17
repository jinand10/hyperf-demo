<?php

declare(strict_types=1);

namespace App\Kernel\Database;

use Hyperf\Database\Query\Builder as QueryBuilder;

/**
 * Class MySqlConnection
 * @author jin <jinand10@163.com>
 */
class MySqlConnection extends \Hyperf\Database\MySqlConnection
{
    public function query(): QueryBuilder
    {
        return new \App\Kernel\Database\QueryBuilder(
            $this,
            $this->getQueryGrammar(),
            $this->getPostProcessor()
        );
    }
}