<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css?v0.2">
    <title>香蕉影城 Banana Cinemas</title>
</head>

<body>
    <header class="container-fluid">
        <div class="row">
            <div class="col-12 px-0">
                <div class="container">
                    <div class="row">
                        <div class="col-2 logo align-items-center">
                            <a href="/"><img src="./imgs/logo.png" alt=""></a>
                        </div>
                        <div class="col-4"></div>
                        <div class="col-2 align-self-end pl-5 pr-0">
                            <?php
                            if(isset($_SESSION['username'])) {
                                echo '<button class="btn shopping-cart" onclick="location.href=\'./my_ticket.php\'"><img src="./imgs/my-ticket.png" alt="your shoping cart" /></button>';
                                echo '<button class="btn shopping-cart" onclick="location.href=\'./cart.php\'"><img src="./imgs/shopping-cart.png" alt="your shoping cart" /></button>';
                            }
                            ?>
                        </div>
                        <div class="col-4 topicon">
                            <div class="row">
                                <div class="icon">
                            <ul class="socialIcons">
                              <li class="facebook"><a href=""><i class="fa fa-fw fa-facebook"></i>Facebook</a></li>
                              <li class="twitter"><a href=""><i class="fa fa-fw fa-twitter"></i>Twitter</a></li>
                              <li class="instagram"><a href=""><i class="fa fa-fw fa-instagram"></i>Instagram</a></li>
                            </ul>
                            </div>
                            </div>
                            <div class="row align-items-center">
                                <?php
                                if(isset($_SESSION['username'])) {
                                    echo '<div class="username"><a href="#" data-toggle="modal" data-target="#reset-popup-box">' . $_SESSION['username'] . '</a></div><div class="username ml-2">你好</div>';
                                    echo '<button class="btn btn-top" onclick="location.href=\'./logout.php\'">登出</button>';
                                }
                                else {
                                    echo '<button type="button" class="btn btn-top" data-toggle="modal" data-target="#login-popup-box">登入</button>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="container px-0">
                    <div class="row">
                        <div class="col-12">
                            <ul class="nav justify-content-around">
                                <li class="nav-item">
                                    <a class="nav-link px-5" href="index.php">首頁</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link px-5" href="movie_intro.php">電影介紹</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link px-5" href="showtime.php">場次查詢</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link px-5" href="about_us.php">影城資訊</a>
                                </li>
                                <?php
                                if(isset($_SESSION['user_id'])) {
                                    echo '<li class="nav-item">
                                        <a class="nav-link px-5" href="customer_service.php">聯絡我們</a>
                                    </li>';
                                }
                                ?>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>