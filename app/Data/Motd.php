<?php

namespace Data;

use \Data\DataFactory;

class Motd extends DataFactory{
	public $id;
	public $title;
	public $content;
	public $updated_at;
	public $created_at;

	public function __construct($id) {
		parent::__construct();
		$this->id = $this->getDB()->quote(str_replace("'", "", $id));
		$this->update();
	}
	public function update() {
		$q = $this->getDB()->query("SELECT * FROM motds WHERE id = $this->id");
		$row = $q->fetch();

		$this->title = $row['title'];
		$this->content = $row['content'];
		$this->updated_at = $row['updated_at'];
		$this->created_at = $row['created_at'];
	}

	public static function nearlyMotds() {
		$nearlyMotds = array();
		$dbFactory = new DataFactory();
		$db = $dbFactory->getDB();

		$q = $db->query("SELECT id FROM motds ORDER BY created_at DESC LIMIT 10");
		while($row = $q->fetch()) {
			array_push($nearlyMotds, new \Data\Motd($row['id']));
		}
		return $nearlyMotds;
	}
}