<?php
class DB
{
	private $dbtype;
	private $hostname;
	private $dbname;
	private $username;
	private $password;
	public $pdo;
    
    //建構子
	public function __construct(){
		$this->dbtype = "mysql";
		$this->dbname = "my_db";
		$this->hostname = "localhost";
		$this->username = "test";
		$this->password = "T1st@localhost";
		
		try
		{
			// 資料庫連線
			$this->pdo = new PDO(
					$this->dbtype.':host='.$this->hostname.';dbname='.$this->dbname,
					$this->username,
					$this->password,
					array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES "utf8mb4"')
			);
		}
		catch (PDOException $e)
		{
			echo 'DB Error!: ' . $e->getMessage() . '<br />';
		}
	}
	
	public function __destruct(){}

	//取得所有資料表欄位名稱
	public function getColumnNames($sql, $arr_param = NULL){
		$query = $this->pdo->prepare($sql);
		$query->execute($arr_param);
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}
	
	//抓取查詢結果(select)
	public function fetchResult($sql, $arr_param = NULL)
	{
		$query = $this->pdo->prepare($sql);
		$query->execute($arr_param);
		return $query->fetchAll(PDO::FETCH_ASSOC);
	}
	
	//新增、修改、刪除的成功列數
	public function getAffectedCount($sql, $arr_param = NULL)
	{
		$query = $this->pdo->prepare($sql);
		$query->execute($arr_param);
		return $query->rowCount();
	}
	
	//取得新增後的新流水 ID (要設定 sn 或 id 欄位為 autoincrement)
	public function getLastInsertSN($sql, $arr_param = NULL)
	{
		$query = $this->pdo->prepare($sql);
		$query->execute($arr_param);
		return $this->pdo->lastInsertId();
	}
}
?>