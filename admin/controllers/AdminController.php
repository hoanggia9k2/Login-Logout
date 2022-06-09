<?php

require "admin/models/AdminModel.php";
require "admin/views/AdminView.php";

class AdminController extends AdminModel {
	public $AdminModel;
	public $AdminView;

	public function __construct()
	{
		$this->AdminModel = new AdminModel();		
		$this->AdminView = new AdminView();
	}

	public function login()
	{
		session_start();
		$this->AdminView->ShowLogin();
		if (isset($_SESSION['username'])) {
			header('Location: index.php');
		}

		if (isset($_POST['submit'])) {
			$username = $_POST['username'];
			$password = $_POST['password'];
			$num = $this->AdminModel->loginAdmin($username,$password);
			if ($num == 1) {
				$_SESSION['username'] = $username;
				header('Location:index.php');
			} else {
				echo "Tài khoản mật khẩu sai";
			}	
		}
	}

	public function logout()
	{
		session_start();
		if (isset($_SESSION['username'])){
			unset($_SESSION['username']);
		}
		header('Location:index.php');
	}
}
?>