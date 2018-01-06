<?php
require_once(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'environment.php');
require_once(__DIR__ . '/../autoload.php');

use Auth\Login;

$user = new Login($_POST['account'], $_POST['password']);
if($user->validate()) {
	echo "Success";
}
else {
	echo "Failed";
}