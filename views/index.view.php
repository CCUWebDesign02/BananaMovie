<!-- https://coolors.co/e9eb87-e2dbbe-9dbbae-769fb6-188fa7
https://coolors.co/e9eb87-241623-f05d5e-0f7173-d56f3e
https://coolors.co/e9eb87-e2dbbe-7fb7be-d3f3ee-241623-->
<div class="container">
    <div class="row">
        <div class="col">
            <div id="my-carousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <?php
                    for($i = 0; $i < count($index_res['carousel']); $i++) {
                        echo '<li data-target="#ad-carousel" data-slide-to="'. $i .'"';
                        if($i == 0) {
                            echo ' class="active"';
                        }
                        echo '></li>';
                    }
                    ?>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <?php
                    $i = 0;
                    foreach($index_res['carousel'] as $val) {
                        //echo '<a href="'. $val[url] .'">';
                        echo '<div class="carousel-item';
                        if($i == 0) {
                            echo ' active';
                        }
                        echo '"><a href="' . $val['url'] . '"><img class="d-block img-fluid" src="imgs/movie/' . $val['src'] . '" alt="'. $val['en_name'] . '"/></a></div>';
                        $i++;
                    }
                    ?>
                </div>
                <a class="carousel-control-prev" href="#my-carousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#my-carousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
    <div class="row now-release justify-content-around">
        <div class="col-12">
            <div class="titlebar">
                <div>現正熱映-></div>
                <hr />
            </div>
            <div class="row">
                <?php
                for($i = 0; $i < 3; $i++) {
                    $movie = $index_res['now_showing'][$i];
                    $release_time = new \DateTime($movie->released, new \DateTimeZone("UTC"));
                    $release_time->setTimezone(new \DateTimeZone(TIMEZONE));
                    $release_time_str = $release_time->format('Y-m-d');
                    //$movie_release = new \DateTime($movie->release, $)
                    echo '<div class="col-4 d-flex flex-wrap justify-content-center">
                        <a href="movie_intro.php?id=' . str_replace("'", "", $movie->id) . '"><img src="imgs/movie/'. $movie->poster . '" alt="' . $movie->en_name . '"/></a>
                        <div class="media ">
                            <img src="imgs/rating-' . $movie->rating . '.png" />
                            <div class="media-body align-self-center movie-title">
                                <a href="./movie_intro.php?id=' . str_replace("'", "", $movie->id) . '">
                                    <div>' . $movie->zh_name . '</div>
                                    <div>' . $release_time_str . '</div>
                                </a>
                            </div>
                        </div>
                    </div>';
                }
                ?>
            </div>
        </div>
    </div>
    <div class="row justify-content-around">
        <div class="col-4 future-release">
            <div class="titlebar">
                <div>即將上映-></div>
                <hr />
            </div>
            <div class="row">
                <?php
                for($i = 0; $i < 1; $i++) {
                    $movie = $index_res['next_stage'][$i];
                    $release_time = new \DateTime($movie->released, new \DateTimeZone("UTC"));
                    $release_time->setTimezone(new \DateTimeZone(TIMEZONE));
                    $release_time_str = $release_time->format('Y-m-d');

                    echo '<div class="col d-flex justify-content-center">
                        <div>
                            <a href="./movie_intro.php?id=' . str_replace("'", "", $movie->id) . '"><img src="imgs/movie/' . $movie->poster . '" alt="' . $movie->en_name . '"/></a>
                            <div class="movie-title">
                                <a href="#">
                                    <div class="text-center">' . $movie->zh_name . '</div>
                                    <div class="text-center">' . $release_time_str . '</div>
                                </a>
                            </div>
                        </div>
                    </div>';
                }
                ?>
            </div>
        </div>
        <div class="col-7 motd">
            <div class="titlebar">
                <div>活動公告-></div>
                <hr />
            </div>
            <div class="row">
                <div class="col d-flex justify-content-center">
                    <table>
                        <?php
                        for($i = 0; $i < 10; $i++) {
                            if(isset($index_res['motd'][$i])) {
                                $motd = $index_res['motd'][$i];
                                $motd_time = new \DateTime($motd->created_at, new \DateTimeZone("UTC"));
                                $motd_time->setTimezone(new \DateTimeZone(TIMEZONE));
                                $motd_time_str = $motd_time->format('Y-m-d');
                                echo '<tr onclick="location.href=\'./motd.php?id=' . str_replace("'", "", $motd->id) . '\'">
                                    <td>' . $motd_time_str . '</td>
                                    <td>' . $motd->title . '</td>
                                    </tr>';
                            }
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>