<!-- https://coolors.co/e9eb87-e2dbbe-9dbbae-769fb6-188fa7
https://coolors.co/e9eb87-241623-f05d5e-0f7173-d56f3e
https://coolors.co/e9eb87-e2dbbe-7fb7be-d3f3ee-241623-->
<?php
require_once(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'environment.php');
require_once(__DIR__ . '/../autoload.php');
require_once(__DIR__ . '/../views/layouts/header.view.php');
use \Data\Res;
$index_res = \Data\Res::index();
require_once(__DIR__ . '/../views/index.view.php');
require_once(__DIR__ . '/../views/layouts/footer.view.php');