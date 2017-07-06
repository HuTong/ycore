<?php
namespace HuTong\Ycore;

use HuTong\Database\Database as Database;

/**
 * Model 基类
 */
class Xmodel
{
	private $conn;

	public function __construct($dbName = 'default')
	{
		if(!isset($this->conn[$dbName]))
		{
			$config = \Yaf\Registry::get('config')->database->toArray();
			if(isset($config[$dbName]))
			{
				$this->conn[$dbName] = Database::getInstance($config[$dbName], $dbName);
			}else{
				throw new \Exception('找不到数据库配置');
			}
		}

		return $this->conn[$dbName];
	}

	public function getEscape($string)
	{
		return $string;
	}
}
