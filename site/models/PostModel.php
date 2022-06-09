<?php
require "PostConnect.php";

class PostModel extends Connect {

	public $con;

	public function __construct()
	{
		$this->con = new Connect();
		return $this->con;
	}

	public function getAllData()
	{
		$sql = "SELECT * FROM thongtinnhanvien";
		$this->con->execute($sql);
		$rows = array();
		if($this->con->result->num_rows>0){
			while ($row = mysqli_fetch_assoc($this->con->result)) {
				$rows[] = $row;
			}
		}

		return $rows;
	}

	public function add($fullname,$gioitinh,$ngaysinh,$diachi,$email,$sdt){
		$sql = "INSERT INTO thongtinnhanvien(fullname,gioitinh,ngaysinh,diachi,email,sdt) VALUES ('$fullname','$gioitinh','$ngaysinh','$diachi','$email','$sdt')";
		$this->con->execute($sql);
		return $this->con->result;
	}

	public function update($id,$fullname,$gioitinh,$ngaysinh,$diachi,$email,$sdt){
		$sql = "UPDATE thongtinnhanvien SET fullname = '$fullname',gioitinh = '$gioitinh',ngaysinh = '$ngaysinh',diachi = '$diachi',email = '$email',sdt='$sdt' WHERE id ='$id'";
		$this->con->execute($sql);
		return $this->con->result;
	}

	public function getData($id){
		$sql = "SELECT * FROM thongtinnhanvien WHERE id = $id";
		$this->con->execute($sql);
		$rows = mysqli_fetch_array($this->con->result);
		return $rows;
	}

	public function delete($id){
		$sql = "DELETE FROM thongtinnhanvien WHERE id = $id";
		$this->con->execute($sql);
		return $this->con->result;
	}
}

?>