<?php
require_once(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'environment.php');
require_once(__DIR__ . '/../autoload.php');
session_start();
if(!isset($_SESSION['user_id'])) {
	header("Location: ./");
}
use \Data\Res;
use \Data\Order;
use \Data\Movie;
use \Data\Ticket;
$my_ticket_res = \Data\Res::my_ticket($_SESSION['user_id']);
require_once(__DIR__ . '/../views/layouts/header.view.php');
require_once(__DIR__ . '/../views/my_ticket.view.php');
require_once(__DIR__ . '/../views/layouts/footer.view.php');