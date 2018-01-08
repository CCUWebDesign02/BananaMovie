<?php
require_once(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'environment.php');
require_once(__DIR__ . '/../autoload.php');
session_start();
if(!isset($_SESSION['user_id'])) {
	header("Location: ./");
}
use \Date\DataFactory;
if(isset($_POST['announce'])) {
	$dbFactory = new \Data\DataFactory();
	$db = $dbFactory->getDB();
	$user_id = $_SESSION['user_id'];
	$content = $_POST['announce'];
	$q = $db->exec("INSERT INTO `customer complaints` (user_id, complaint, `date`) VALUES ($user_id, '$content', CURRENT_TIME)");
}

