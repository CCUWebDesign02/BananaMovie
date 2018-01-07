<?php

namespace Data;

use Data\DataFactory;

class Movie extends DataFactory{
	public $id;
	public $zh_name;
	public $en_name;
	public $duration;
	public $rating;
	public $released;
	public $director;
	public $actors;
	public $intro;
	public $trailer_url;

	public $banner;
	public $poster;

	public function __construct($id) {
		parent::__construct();
		$this->id = $this->getDB()->quote(str_replace("'", "", $id));
		//$this->id = strstr($this->id, array('_'=> '\_', '%' => '\%'));
		$this->updateInfo();
		$this->updateResource();
	}

	public function updateInfo() {
		$q = $this->getDB()->query("SELECT * FROM movies WHERE id = $this->id");
		$row = $q->fetch();
		$this->zh_name = $row['zh_name'];
		$this->en_name = $row['en_name'];
		$this->duration = $row['duration'];
		$this->rating = $row['rating'];
		$this->released = $row['released'];
		$this->director = $row['director'];
		$this->actors = $row['actors'];
		$this->intro = $row['intro'];
		$this->trailer_url = $row['trailer_url'];
	}

	public function updateResource() {
		$q = $this->getDB()->query("SELECT type, src FROM movie_resource WHERE movie_id = $this->id");
		while($row = $q->fetch()) {
			if(strcasecmp($row['type'], 'banner') == 0) {
				$this->banner = $row['src'];
			}
			elseif(strcasecmp($row['type'], 'poster') == 0) {
				$this->poster = $row['src'];
			}
		}
	}
	public function getTime() {
		
	}
	public static function nowShowing() {
		$nowShowing = array();
		$dbFactory = new DataFactory();
		$db = $dbFactory->getDB();

		$now = new \DateTime("now", new \DateTimeZone("UTC"));
		$nowStr = $now->format('Y-m-d H:i:s');
		$q = $db->query("SELECT id FROM movies WHERE released <= '$nowStr' ORDER BY released DESC");
		while($row = $q->fetch()) {
			array_push($nowShowing, new \Data\Movie($row['id']));
		}
		return $nowShowing;
	}
	public static function nextStage() {
		$nextStage = array();
		$dbFactory = new DataFactory();
		$db = $dbFactory->getDB();

		$now = new \DateTime("now", new \DateTimeZone("UTC"));
		$nowStr = $now->format('Y-m-d H:i:s');
		$q = $db->query("SELECT id FROM movies WHERE released > '$nowStr' ORDER BY released ASC");
		while($row = $q->fetch()) {
			array_push($nextStage, new \Data\Movie($row['id']));
		}
		return $nextStage;
	}
}