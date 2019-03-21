<?php

namespace App\Models;

use Core\DB\QueryBuilder;

use PDO;
use PDOException;


class Comments extends QueryBuilder
{
	protected $id, $body, $createdAt, $newsId;
	protected static $pdo;

	public function __construct () {
		parent::__construct();
	}

	/*
    |----------------------------
	| override function from parent
	| getting all comment from 1 news
    |
	*/

	public function selectOne ($table, $fkId) {
		$statement = static::$pdo->prepare("select * from {$table} where news_id =  ?");
        $statement->execute([$fkId]);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
	}

	/*
    |----------------------------
    | Creating data for News
    |
    */
	
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
}