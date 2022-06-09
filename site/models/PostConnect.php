<?php

class Connect 
{
	public $servername = "localhost";
	public $user = "root";
	public $pass = "";
	public $data = "quanlycongty";

	public $conn;
	public $result;

	public function __construct()
	{
		$this->conn= new mysqli($this->servername,$this->user,$this->pass,$this->data);
		if(!$this->conn){
			echo "Kết nối thất bại";
			exit();
		}else{
			mysqli_set_charset($this->conn,'utf-8');
		}
		return $this->conn;
	}

	public function execute($sql)
	{
		$this->result = mysqli_query($this->conn, $sql);
		return $this->result;
	}

}
?>
