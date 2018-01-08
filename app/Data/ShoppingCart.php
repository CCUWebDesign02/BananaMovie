<?php

namespace Data;

class ShoppingCart extends DataFactory{

	public $user_id;
	public $ticket_id;
	public $num;
	public $created_at;

	public function __construct($user_id, $ticket_id) {
		parent::__construct();
		$this->user_id = $this->getDB()->quote(str_replace("'", "", $user_id));
		$this->ticket_id = $this->getDB()->quote(str_replace("'", "", $ticket_id));
		$this->updateInfo();
	}

	public function updateInfo() {
		$q = $this->getDB()->query("SELECT * FROM shopping_cart WHERE user_id = $this->user_id AND ticket_id = $this->ticket_id");
		$row = $q->fetch();
		if($row == null) return;
		$this->num = $row['num'];
		$this->created_at = $row['created_at'];
	}

	public static function getByUserID($user_id) {
		$userCart = array();
		$dbFactory = new DataFactory();
		$db = $dbFactory->getDB();
		$cart_content = array();
		$q = $db->query("SELECT ticket_id FROM shopping_cart WHERE user_id = $user_id");

		while($row = $q->fetch()) {
			//echo $row['ticket_id'];
			array_push($userCart, new \Data\ShoppingCart($user_id, $row['ticket_id']));
		}

		return $userCart;
	}
	public function add($num) {
		if($num < 0) return false;
		if(isset($this->num) && $this->num >= 0) {
			$after_num = $this->num + $num;
			$this->getDB()->exec("UPDATE shopping_cart SET num = $after_num WHERE user_id = $this->user_id AND ticket_id = $this->ticket_id");
		}
		else {
			$this->getDB()->exec("INSERT INTO shopping_cart (user_id, ticket_id, num, created_at) VALUES ($this->user_id, $this->ticket_id, $num, CURRENT_TIME)");
		}
		return true;
	}
	public function update($num) {
		if($num < 0) return false;
		$this->getDB()->exec("UPDATE shopping_cart SET num = $num WHERE user_id = $this->user_id AND ticket_id = $this->ticket_id");
	}
	public function delete() {
		$this->getDB()->exec("DELETE FROM shopping_cart WHERE user_id = $this->user_id AND ticket_id = $this->ticket_id");
		$this->__destruct();
	}
}