<?php

namespace Core\DB;

use PDO;

class Connection
{
    public static function connect ($config) {
        try {
            return new PDO(
                $config['connection'].';dbname='.$config['name'],
                $config['username'],
                $config['password'],
                $config['options']
            );
        } catch (PDOException $e) {
            dd($e->getMessage());
        }
    }
}