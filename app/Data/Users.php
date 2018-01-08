<?php

namespace Data;
use Data\DataFactory;

class Users extends DataFactory{

	public $id;
	public $account;
	public $name;
	public $email;
	public $last_loggedin;

	public function __construct($id) {
		parent::__construct();
		$this->id = $this->getDB()->quote($id);
		//$this->id = strstr($this->id, array('_'=> '\_', '%' => '\%'));
		$this->updateInfo();
	}

	public function updateInfo() {
		$q = $this->getDB()->query("SELECT account, name, email, last_loggedin FROM users WHERE id = $this->id");
		$row = $q->fetch();
		$this->account = $row['account'];
		$this->name = $row['name'];
		$this->email = $row['email'];
		$this->last_loggedin = $row['last_loggedin'];
	}

	public static function getByAccount($account) {
		$dbFactory = new \Data\DataFactory();
		$db = $dbFactory->getDB();

		$q = $db->query("SELECT id FROM users WHERE account = '$account'");

		return $q->fetch();
	}
}