<?php
require_once(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'environment.php');
require_once(__DIR__ . '/../autoload.php');
session_start();
if(!isset($_SESSION['user_id'])) {
	header("Location: ./");
}
require_once(__DIR__ . '/../views/layouts/header.view.php');
use \Data\Res;
require_once(__DIR__ . '/../views/client.view.php');
require_once(__DIR__ . '/../views/layouts/footer.view.php');