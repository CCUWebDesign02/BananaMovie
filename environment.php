<?php

$config = parse_ini_file('config.ini');
define('BASE_PATH', __DIR__);
define('SR_PASSLENGTH', $config['SR_PASSLENGTH']);
define('TIMEZONE', $config['TIMEZONE']);