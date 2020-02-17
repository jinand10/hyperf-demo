<?php

declare(strict_types=1);

namespace App\Kernel\Database;

/**
 * Trait DataCacheTrait
 * @package App\Kernel\Database
 */
trait DataCacheTrait
{
    /**
     * Get a new query builder instance for the connection.
     *
     * @return \App\Kernel\Database\QueryBuilder
     */
    protected function newBaseQueryBuilder()
    {
        $connection = $this->getConnection();

        return new \App\Kernel\Database\QueryBuilder($connection, $connection->getQueryGrammar(), $connection->getPostProcessor());
    }
}