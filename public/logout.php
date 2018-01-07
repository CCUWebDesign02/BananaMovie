<?php
session_start();
unset($_SESSION['user_token']);
unset($_SESSION['username']);
session_destroy();
header('Location: ./');