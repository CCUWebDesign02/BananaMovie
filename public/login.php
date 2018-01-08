<?php
//  header('Content-type: application/json');
require_once(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'environment.php');
require_once(__DIR__ . '/../autoload.php');
session_start();
use Auth\Login;
if(isset($_SESSION['user_id'])) {
	header("Location: ./");
}
$user = new Login($_POST['account'], $_POST['password']);
$array = array('code' => '');
if($user->validate()) {
	$array['code'] = 'PASS';
}
else {
	$array['code'] = 'FAILED';
}
header('Location: .' . $_SERVER[PATH_INFO]);
//echo json_encode($array);