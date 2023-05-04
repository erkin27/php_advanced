<?php

namespace Php\Advanced\Connections;

use PDO;

class DB
{
    public static function getPDO()
    {
        return new PDO(
            'pgsql:host=db;port=5432;dbname=postgres',
            'postgres',
            'pass',
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]
        );
    }
}
