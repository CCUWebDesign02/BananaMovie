<?php

namespace Data;

use \Data\DataFactory;

class Motd {
	public $id;
	public $title;
	public $content;
	public $updated_at;
	public $created_at;

	public function __construct($id) {
		parent::__construct();
		$this->id = $this->getDB()->quote($id);
	}
	public function update() {
		$q = $this->getDB()->query("SELECT * FROM motds WHERE id = $this->id");
		$row = $q->fetch();

		$this->title = $row[];
		$this->content = $row[];
		$this->updated_at = $row[];
		$this->created_at = $row[];
	}
}