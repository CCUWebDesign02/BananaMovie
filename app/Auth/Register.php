<?php

namespace Auth;

use Data\Users;
use Data\DataFactory;

class Register {
	private function __construct() {}

	public static function newUser($user) {
		if(self::validate($user) == false) {
			return false;
		}
		$account = $user['account'];
		echo $user['account'];
		$name = $user['name'];
		$email = $user['email'];
		
		
		$password_hash = password_hash($user['password'], PASSWORD_DEFAULT);
		$now = new \DateTime("now", new \DateTimeZone("UTC"));
		$now_str = $now->format('Y-m-d H:i:s');
		$dbFactory = new \Data\DataFactory();
		$db = $dbFactory->getDB();
		//echo "INSERT INTO users (account, password, name, email, updated_at, created_at) VALUES ($user[account], $password_hash, $user[name], $user[email], $now_str, $now_str)";
		$db->exec("INSERT INTO users (account, password, name, email, updated_at, created_at) VALUES ('$account', '$password_hash', '$name', '$email', '$now_str', '$now_str')");
		return true;
	}
	private static function validate($user) {
		if(\Data\Users::getByAccount($user['account']) != null) {
			echo "Account exists!";
			return false;
		}
		if(strlen($user['password']) < SR_PASSLENGTH) {
			echo '2';
			return false;
		}
		if(!filter_var($user['email'], FILTER_VALIDATE_EMAIL)) {
			echo '3';
			return false;
		}
		return true;
	}
}