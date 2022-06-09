<?php
require "site/models/PostModel.php";

class AdminModel extends PostModel {
	public $admin;

	public function __construct()
	{
		$this->admin = new PostModel();
		return $this->admin;
	}

	public function loginAdmin($username,$password)
	{
		$sql="SELECT * FROM dangnhap WHERE username = '$username' AND password = '$password'";
		$this->admin->con->execute($sql);
		$num = mysqli_num_rows($this->admin->con->result);
		return $num;
	}
}
?>