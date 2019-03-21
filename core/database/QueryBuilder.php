<?php

namespace Core\DB;

use PDO;
use PDOException;

class QueryBuilder
{
    protected static $pdo;

    public function __construct () {
        static::$pdo = \Core\DB\Connection::connect(
			\Core\App::get('config')['database']
		);
    }

    public function selectOne ($table, $pkId) {
        $statement = static::$pdo->prepare("select * from {$table} where id =  ?");
        $statement->execute([$pkId]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function selectAll ($table, $data = []) {
        $statement = static::$pdo->prepare("select * from {$table}");
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_CLASS);
    }

    public function create($table, $parameters) {
        $sql = sprintf(
            'insert into %s (%s) values (%s)',
            $table,
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );

        try {
            $statement = static::$pdo->prepare($sql);
            $statement->execute($parameters) or die($statement->errorInfo()[2]);
        } catch (PDOException $e) {
            die('something is wrong.');
        }
    }

    public function update($table, $parameters) {
        $sql = sprintf(
            'update %s set %s , %s where %s',
            $table,
            'title = :title',
            'body = :body',
            'id = :id'
        );

        try {
            $statement = static::$pdo->prepare($sql);
            $statement->execute($parameters) or die($statement->errorInfo()[2]);
        } catch (PDOException $e) {
            die('something is wrong.');
        }
    }

    public function delete($table, $parameters) {

        $sql = sprintf(
            'delete from %s where %s',
            $table,
            'id = :id'
        );

        try {
            $statement = static::$pdo->prepare($sql);
            $statement->execute($parameters) or die($statement->errorInfo()[2]);
        } catch (PDOException $e) {
            die('something is wrong.');
        }

    }

    

}
