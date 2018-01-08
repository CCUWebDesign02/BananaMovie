<?php

namespace Auth;

use Data\DataFactory;
use Data\Users;

class Login {
	private $id;
	private $account;
	private $password;
	private $token;
	private $db;

	public function __construct($account, $password) {
		$this->account = $account;
		$this->password = $password;

		$dbFactory = new \Data\DataFactory();
		$this->db = $dbFactory->getDB();
	}
	public function validate() {
		$q = $this->db->query("SELECT id, password, name FROM users WHERE account = '$this->account'");
		$row = $q->fetch();
		if($row == null) { //無此帳號
			return false;
		}
		$this->id = $row['id'];
		//echo $this->password;
		$password_hash = $row['password'];
		if(password_verify($this->password, $password_hash)) { //驗證密碼
			$this->grantToken();
			$this->updateUser();
			session_start();
			$user = new \Data\Users($this->id);
			$_SESSION['user_token'] = $this->token;
			$_SESSION['username'] = $user->name;
			$_SESSION['user_id'] = $user->id;
			$_SESSION['user_account'] = $user->account;
			return true;
		}
		return false;
	}
	public function updateUser() {
		$now = new \DateTime("now", new \DateTimeZone("UTC"));
		$now_str = $now->format('Y-m-d H:i:s');
		$stmt = $this->db->prepare("UPDATE users SET token = ?, last_loggedin = ? WHERE id = ?");
		$stmt->execute(array($this->token, $now_str, $this->id));
	}
	public function grantToken() {
		$now = new \DateTime("now", new \DateTimeZone('UTC'));
		$newToken = $this->token + $now->format('Y-m-d H-i-s');
		$newToken = hash('sha256', md5(uniqid(rand())) + $newToken);
		$this->token = $newToken;
	}
}