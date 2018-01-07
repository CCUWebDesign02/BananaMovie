<?php

namespace \Data;

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
		$this->num = $row['num'];
		$this->status = $row['status'];
		$this->created_at = $row['created_at'];
	}

	public static function pay() {
		
	}
}