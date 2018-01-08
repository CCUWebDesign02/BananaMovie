<?php
require_once(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'environment.php');
require_once(__DIR__ . '/../autoload.php');
session_start();
if(!isset($_SESSION['user_id'])) {
	header("Location: ./");
}
use \Data\Order;
\Data\Order::pay($_SESSION['user_id']);

header('Location: ./my_ticket.php');