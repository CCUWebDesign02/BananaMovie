<?php
require_once(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'environment.php');
require_once(__DIR__ . '/../autoload.php');
session_start();
use \Auth\Register;

$user = array(
	'account' => $_POST['account'],
	'password' => $_POST['password'], //密碼長度>=6
	'name' => $_POST['username'],
	'email' => $_POST['email']
);
echo $user['password'];
\Auth\Register::newUser($user);