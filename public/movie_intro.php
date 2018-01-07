<?php
require_once(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'environment.php');
require_once(__DIR__ . '/../autoload.php');
session_start();
require_once(__DIR__ . '/../views/layouts/header.view.php');
use \Data\Res;
use \Tools\Data;
if(isset($_GET['id'])) {
	$movie_intro_res = \Data\Res::movieIntro($_GET['id']);
	//print_r($movie_intro_res['all_tickets']);
	//echo count($movie_intro_res['all_tickets']);
	require_once(__DIR__ . '/../views/movie_intro.view.php');
}
else {
	$index_res = \Data\Res::index();
	require_once(__DIR__ . '/../views/movie_intro_main.view.php');
}
require_once(__DIR__ . '/../views/layouts/footer.view.php');