<?php

require "site/models/PostModel.php";
require "site/views/PostView.php";

class PostController extends PostModel {
	public $postModel;
	public $postView;

	public function __construct()
	{
		$this->postModel = new PostModel();		
		$this->postView = new PostView();
	}

	public function getPost()
	{
		$rows = $this->postModel -> getAllData();
		$this->postView -> showAllData($rows);
	}

	public function addPost()
	{
		$this->postView -> showAdd();

		if(isset($_POST['add'])){
			$username = $_POST['username'];
			$password = $_POST['password'];
			$fullname = $_POST['fullname'];
			$gioitinh = $_POST['gioitinh'];
			$ngaysinh = $_POST['ngaysinh'];
			$diachi = $_POST['diachi'];
			$email = $_POST['email'];
			$sdt = $_POST['sdt'];

			if($this->postModel -> add($fullname,$gioitinh,$ngaysinh,$diachi,$email,$sdt)){
				header('Location: ?');
			}else{
				header('Location: ?action=error');
			}
		}
	}

	public function updatePost()
	{
		if (isset($_GET['id']))
		{
			$id = $_GET['id'];
			$this->postModel -> getData($id);
			$rows = $this->postModel -> getData($id);

			$this->postView -> showUpdate($rows);

			if(isset($_POST['update'])){
				$fullname = $_POST['fullname'];
				$gioitinh = $_POST['gioitinh'];
				$ngaysinh = $_POST['ngaysinh'];
				$diachi = $_POST['diachi'];
				$email = $_POST['email'];
				$sdt = $_POST['sdt'];
				if($this->postModel->update($id,$fullname,$gioitinh,$ngaysinh,$diachi,$email,$sdt)){
					header('Location: ?');
				}else{
					header('Location: ?action=error');
				}
			}
		}
	}

	public function deletePost()
	{
		if (isset($_GET['id'])){
			$id = $_GET['id'];
			$this->postModel -> delete($id);
			if($this->postModel->update($id,$fullname,$gioitinh,$ngaysinh,$diachi,$email,$sdt)){
				header('Location: ?');
			}else{
				header('Location: ?action=error');
			}
		}
	}

	public function errorPost()
	{
		$this->postView -> error();
	}

	public function insertPost()
	{
		if (isset($_GET['id']))
		{
			$id = $_GET['id'];
			$this->postModel -> getData($id);
			$rows = $this->postModel -> getData($id);	

			$this->postView -> showInsert($rows);
		}
	}
}
?>