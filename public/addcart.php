<?php
//  header('Content-type: application/json');
require_once(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'environment.php');
require_once(__DIR__ . '/../autoload.php');
session_start();
if(isset($_SESSION['user_id'])) {
	header("Location: ./");
}
use \Data\ShoppingCart;
//echo $_SESSION['user_id'], $_POST['ticket_id'], $_POST['num'];
if(isset($_SESSION['user_id'])) {
	$act = new \Data\ShoppingCart($_SESSION['user_id'], $_POST['ticket_id']);
	
	if(strcasecmp($_POST['action'], 'update') == 0) {
		$act->update($_POST['num']);
		//echo 'V' . $_POST['num'];
	}
	else {
		$act->add($_POST['num']);
		//echo 'S' . $_POST['num'];
	}
	if(strcasecmp($_POST['next_action'], 'pay') == 0) {
		header('Location: ./cart.php');
	}
	else {
		header('Location: ' . $_POST['return_page']);
	}
}
else {
	header('Location: ./');
}