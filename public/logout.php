<?php
session_start();
if(!isset($_SESSION['user_id'])) {
	header("Location: ./");
}
unset($_SESSION['user_token']);
unset($_SESSION['username']);
session_destroy();
header('Location: ./');