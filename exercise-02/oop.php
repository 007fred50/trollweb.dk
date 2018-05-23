<?php

class validator{

	public $mysqlpdo;
	public $count;

	public function connpdo_1($sql, $pdoarray)
	{
		try{
			$db = new PDO("mysql:host=127.0.0.1;dbname=phpdevelper;charset=utf8","root","21767689");
			// $myinsecuredata=1;
			$query=$db->prepare($sql);
			$query->execute($pdoarray);
			$errorlog = $query->errorInfo();
			if($errorlog['2'] != ""){
				echo $errorlog['2'];
			}
		}catch(PDOException  $e ){
			echo "Error: ".$e;
		}

		//1 
		$this->mysqlpdo = $query->fetch(PDO::FETCH_OBJ);
		$db=null;
	}
	public function connpdo_all($sql)
	{
		try{
			$db = new PDO("mysql:host=127.0.0.1;dbname=phpdevelper;charset=utf8","root","21767689");
			$query=$db->prepare($sql);
			$query->execute();
			$errorlog = $query->errorInfo();
			if($errorlog['2'] != ""){
				echo $errorlog['2'];
			}
			$this->count = $query->rowCount();
		}catch(PDOException  $e ){
			echo "Error: ".$e;
		}

		//All
		$this->mysqlpdo = $query->fetchAll(PDO::FETCH_OBJ);
		$db=null;
	}
}

?>