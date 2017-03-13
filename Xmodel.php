<?php
namespace HuTong\Ycore;
use HuTong\Database\Database as Database;
/**
 * Model 基类
 */
class Xmodel
{
	protected $db;

	public function __construct($dbName = 'default')
	{
		if(is_null($this->db))
		{
			$config = \Yaf\Registry::get('config')->database->toArray();
			if(isset($config[$dbName]))
			{
				$this->db = Database::getInstance($config[$dbName], $dbName);
			}else{
				throw new \Exception('找不到数据库配置');
			}
		}
	}
}
