<?php
require_once(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'environment.php');
require_once(__DIR__ . '/../autoload.php');
session_start();
use \Auth\Register;

$user = array(
	'account' => 'hihi',
	'password' => '123456', //密碼長度>=6
	'name' => 'nana',
	'email' => 'nana@example.com'
);
\Auth\Register::newUser($user);