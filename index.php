<?php
session_start();

if (!isset($_SESSION['username'])) {
	header('Location: admin.php');
	
}

$action = $_GET['action'];

require "site/controllers/PostController.php";
$postController = new PostController();

switch ($action) {
	case 'add':
		$postController ->addPost();
		break;

	case 'error':
		$postController ->errorPost();
		break;

	case 'update':
		$postController ->updatePost();
		break;

	case 'delete':
		$postController ->deletePost();
		break;

	case 'insert':
		$postController ->insertPost();
		break;

	default:
		$postController -> getPost();
		break;
}
?>