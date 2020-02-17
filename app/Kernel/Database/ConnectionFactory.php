<?php

declare(strict_types=1);

namespace App\Kernel\Database;

use InvalidArgumentException;

/**
 * Class ConnectionFactory
 * @author jin <jinand10@163.com>
 */
class ConnectionFactory extends \Hyperf\Database\Connectors\ConnectionFactory
{
    protected function createConnection($driver, $connection, $database, $prefix = '', array $config = [])
    {
        if ($resolver = \App\Kernel\Database\MySqlConnection::getResolver($driver)) {
            return $resolver($connection, $database, $prefix, $config);
        }

        switch ($driver) {
            case 'mysql':
                return new \App\Kernel\Database\MySqlConnection($connection, $database, $prefix, $config);
        }

        throw new InvalidArgumentException("Unsupported driver [{$driver}]");
    }
}