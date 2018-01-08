<?php

namespace Data;

use \Data\DataFactory;

class Order extends DataFactory{
	public $id;
	public $user_id;
	public $ticket_id;
	public $num;
	public $status;
	public $created_at;

	public function __construct($id, $user_id, $ticket_id) {
		parent::__construct();
		$this->id = $this->getDB()->quote(str_replace("'", "", $id));
		$this->user_id = $this->getDB()->quote(str_replace("'", "", $user_id));
		$this->ticket_id = $this->getDB()->quote(str_replace("'", "", $ticket_id));
		$this->updateInfo();
	}

	public function updateInfo() {
		$q = $this->getDB()->query("SELECT * FROM orders WHERE id = $this->id AND user_id = $this->user_id AND ticket_id = $this->ticket_id");
		
		$row = $q->fetch();
		if(isset($row)) {
			$this->num = $row['num'];
			$this->status = $row['status'];
			$this->created_at = $row['created_at'];
		}
	}

	public function add() {
		$this->getDB()->exec("INSERT INTO orders (id, user_id, ticket_id, num, status, created_at) VALUES ($this->id, $this->user_id, $this->ticket_id, $this->num, $this->status, CURRENT_TIME)");
	}

	public function update() {
		$this->getDB()->exec("UPDATE orders SET num = $this->num WHERE id = $this->id AND user_id = $this->user_id AND ticket_id = $this->ticket_id");
	}

	public static function pay($user_id) {
		$dbFactory = new DataFactory();
		$db = $dbFactory->getDB();
		$q = $db->query("SELECT max(id) as max_id FROM orders");
		$new_id = 1;
		if($q->fetch()['max_id'] != null) {
			$new_id  += 1;
		}

		$carts = \Data\ShoppingCart::getByUserID($user_id);
		foreach($carts as $cart) {
			$order = new \Data\Order($new_id, $user_id, $cart->ticket_id);
			$order->num += $cart->num;
			if($order->created_at != null) {
				$order->update();
				$cart->delete();
				break;
			}
			$order->status = 1;
			$order->add();
			$cart->delete();
		}
	}
	public static function getByUserID($user_id) {
		$dbFactory = new DataFactory();
		$db = $dbFactory->getDB();
		$q = $db->query("SELECT * FROM orders WHERE user_id = $user_id ORDER BY id ASC");

		return $q->fetchAll();
	}
}