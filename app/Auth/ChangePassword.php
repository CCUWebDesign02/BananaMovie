<?php

namespace Auth;

use Data\Users;
use Data\DataFactory;

class ChangePassword {
	private function __construct() {}

	public static function change($user) {
		echo '0';
		if(self::validate($user) == false) {
			return false;
		}
		$user_id = $user['user_id'];
		$old_password = $user['old_password'];
		$new_password = $user['new_password'];
		$new_password_confirm = $user['new_password_confirm'];
		
		
		$password_hash = password_hash($new_password, PASSWORD_DEFAULT);
		$now = new \DateTime("now", new \DateTimeZone("UTC"));
		$now_str = $now->format('Y-m-d H:i:s');
		$dbFactory = new \Data\DataFactory();
		$db = $dbFactory->getDB();
		//echo "INSERT INTO users (account, password, name, email, updated_at, created_at) VALUES ($user[account], $password_hash, $user[name], $user[email], $now_str, $now_str)";
		$db->exec("UPDATE users SET password = '$password_hash' WHERE id = $user_id");
		header("Location: ./logout.php");
		return true;
	}
	private static function validate($user) {

		$dbFactory = new \Data\DataFactory();
		$db = $dbFactory->getDB();
		$user_id = $user['user_id'];
		$q = $db->query("SELECT password FROM users WHERE id = $user_id");
		if(!password_verify($user['old_password'], $q->fetch()['password'])) {
			echo '1';
			return false;
		}
		if(strlen($user['new_password']) < SR_PASSLENGTH) {
			echo '2';
			return false;
		}
		if(strcmp($user['new_password'], $user['new_password_confirm']) != 0) {
			echo '3';
			return false;
		}
		echo '4';
		return true;
	}
}