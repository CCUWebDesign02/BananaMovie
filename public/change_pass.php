<?php
require_once(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'environment.php');
require_once(__DIR__ . '/../autoload.php');
session_start();

use \Auth\ChangePassword;

if(isset($_SESSION['user_id'])) {
	$user = array(
		'user_id' => $_SESSION['user_id'],
		'old_password' => $_POST['old_password'], //密碼長度>=6
		'new_password' => $_POST['new_password'],
		'new_password_confirm' => $_POST['new_password_confirm']
	);

	\Auth\ChangePassword::change($user);
}