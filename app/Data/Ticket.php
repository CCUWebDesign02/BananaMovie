<?php

namespace Data;

use Data\DataFactory;

class Ticket extends DataFactory{
	public $id;
	public $movie_id;
	public $showing_time;
	public $hall;
	public $quantity;
	public $remanded;
	public $updated_at;
	public $created_at;

	public function __construct($id) {
		parent::__construct();
		$this->id = $this->getDB()->quote(str_replace("'", "", $id));
		//$this->id = strstr($this->id, array('_'=> '\_', '%' => '\%'));
		$this->updateInfo();
	}

	public function updateInfo() {
		$q = $this->getDB()->query("SELECT * FROM tickets WHERE id = $this->id");
		$row = $q->fetch();
		$this->movie_id = $row['movie_id'];
		$this->showing_time = $row['showing_time'];
		$this->hall = $row['hall'];
		$this->quantity = $row['quantity'];
		$this->remanded = $row['remanded'];
		$this->updated_at = $row['updated_at'];
		$this->created_at = $row['created_at'];
	}

	public static function getByMovie($movie_id) {
		$movie_tickets = array();
		$dbFactory = new DataFactory();
		$db = $dbFactory->getDB();

		$q = $db->query("SELECT * FROM tickets WHERE movie_id = '$movie_id' AND showing_time > CURRENT_TIME ORDER BY DATE(showing_time) ASC, hall ASC, showing_time ASC");
		/*while($row = $q->fetch()) {
			array_push($movie_tickets, new \Data\Ticket($row['id']));
		}*/
		return $q->fetchAll();
	}
}