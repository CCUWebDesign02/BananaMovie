<?php
require_once(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'environment.php');
require_once(__DIR__ . '/../autoload.php');
session_start();
require_once(__DIR__ . '/../views/layouts/header.view.php');
use \Data\Res;
$cart_res = \Data\Res::cart($_SESSION['user_id']);
//print_r($cart_res);
require_once(__DIR__ . '/../views/cart.view.php');
require_once(__DIR__ . '/../views/layouts/footer.view.php');