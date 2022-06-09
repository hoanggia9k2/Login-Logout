<?php
$Admin = $_GET['admin'];

require "admin/controllers/AdminController.php";
$AdminController = new AdminController();

switch ($Admin) {
	case 'logout':
		$AdminController ->logout();
		break;
		
	default:
		$AdminController ->login();
		break;
}
?>