<?php
/**
 * Model 基类
 */
namespace HuTong\Ycore;

use HuTong\Database\Database as Database;

class Xmodel
{
	private $conn;
	private $instance;

	public function __construct($dbName = 'default')
	{
		if(!isset($this->conn[$dbName]))
		{
			if(is_null($this->instance))
			{
				$config = \Yaf\Registry::get('config')->database->toArray();
				$this->instance = new Database($config);
			}

			$this->conn[$dbName] = $this->instance->getInstance($dbName);
		}

		return $this->conn[$dbName];
	}

	public function getEscape($string)
	{
		return $string;
	}
}
