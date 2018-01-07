<?php
require_once(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'environment.php');
require_once(__DIR__ . '/../autoload.php');
session_start();
require_once(__DIR__ . '/../views/layouts/header.view.php');
require_once(__DIR__ . '/../views/movie_intro_main.view.php');
require_once(__DIR__ . '/../views/layouts/footer.view.php');