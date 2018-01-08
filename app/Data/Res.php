<?php

namespace Data;

use Data\DataFactory;
use Data\Movie;
use Data\Tikcet;
use Tools\Date as TDate;
use Data\Order;

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

	public static function movieIntro($movie_id) {
		$movie = new \Data\Movie($movie_id);
		$movie_time = \Data\Ticket::getByMovie($movie_id);
		$time_table = \Data\Res::toTimeTable($movie_time);
		
		return array(
			'movie' => $movie,
			'all_tickets' => $movie_time,
			'time_table' => $time_table
		);
	}
	public static function toTimeTable($movie_time) {
		$time_table = null;
		for($i = 0; $i < count($movie_time); $i++) {
			$row = $movie_time[$i];
			$datetime = TDate::toTimeZone(TDate::toDateTime($row['showing_time']));
			$dateStr = TDate::toYmd($datetime);
			/*print_r($time_table);
			echo '<br/>';
			echo $dateStr . 'Checked->';*/
			if(isset($time_table[$dateStr])) {
				//echo 'is Set<br/>';
				if(isset($time_table[$dateStr][$row['hall']])) {
					array_push($time_table[$dateStr][$row['hall']], $row['showing_time']);
				}
				else {
					//echo $row['hall'];
					$time_table[$dateStr][$row['hall']] =  array($row['showing_time']);
				}
			}
			else {
				//echo 'is not set<br/>';
				$time= $row['showing_time'];
				$hall = array($time);
				$date = array($row['hall'] => $hall);
				$time_table[$dateStr] = $date;
			}
		}
		/*$a4 = array('2018-01-08 00:00:00', '2018-01-08 03:00:00');
		$hall= array('A' => $a4);
		$a['2018-01-08'] = $hall;
		print_r($a);
		return $a;*/
		return $time_table;
	}
	public static function cart($user_id) {
		$userCart = \Data\ShoppingCart::getByUserID($user_id);
		//print_r($userCart);
		$cart_content = array();
		for($i = 0; $i < count($userCart); $i++) {
			$ticket = new \Data\Ticket($userCart[$i]->ticket_id);
			$movie = new \Data\Movie($ticket->movie_id);
			$num = $userCart[$i]->num;
			array_push(
				$cart_content, 
				array(
					'movie' => $movie, 
					'ticket' => $ticket, 
					'number' => $num
				)
			);
		}
		//print_r($cart_content);
		//echo $cart_content['movie']->poster;
		return array('cart_content' => $cart_content);
	}

	public static function my_ticket($user_id) {
		$orders = \Data\Order::getByUserID($user_id);

		return array('orders' => $orders);
	}
}