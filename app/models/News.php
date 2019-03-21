<?php

namespace App\Models;

use Core\DB\QueryBuilder;

class News extends QueryBuilder
{
	protected $id, $title, $body, $createdAt;
	protected static $pdo;

	public function __construct () {
		parent::__construct();
	}
}