<?php
header('Content-type: application/json');
require_once(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'environment.php');
require_once(__DIR__ . '/../autoload.php');

use Auth\Login;

$user = new Login($_POST['account'], $_POST['password']);
$array = array('code' => '');
if($user->validate()) {
	$array['code'] = 'PASS';
}
else {
	$array['code'] = 'FAILED';
}

echo json_encode($array);