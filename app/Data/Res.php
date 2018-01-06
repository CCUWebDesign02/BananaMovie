<?php

namespace Data;

use Data\DataFactory;
use Data\Movie;

class Res {
	public static function index() {
		$dbFactory = new DataFactory();
		$db = $dbFactory->getDB();
		if(isset($_SESSION['token'])) {

		}
		$q = $db->query(
			"SELECT movies.id, movies.en_name, movie_resource.src, carousel.url
			 FROM carousel, movies, movie_resource
			 WHERE carousel.movie_resource_id = movie_resource.id AND movie_resource.movie_id = movies.id AND movie_resource.type = 'banner'
			 ORDER BY carousel.id DESC
			 LIMIT 10");
		$carousel = $q->fetchAll(); // id, en_name, src, url

		$nowShowing = \Data\Movie::nowShowing();
		$nextStage = \Data\Movie::nextStage();
		$motd = \Data\Motd::nearlyMotds();
		return array(
			'carousel' => $carousel,
			'now_showing' => $nowShowing,
			'next_stage' => $nextStage,
			'motd' => $motd
		);
	}
}