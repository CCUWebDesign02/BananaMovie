<div class="container intro">
    <!--<input type="" name="" id="search" />-->
    <div class="row now-release justify-content-around">
        <div class="col-12">
            <div class="titlebar">
                <div>現正熱映-></div>
                <hr />
            </div>
            <div class="row" id="searched-item">
                <?php
                for($i = 0; $i < count($index_res['now_showing']); $i++) {
                    $movie = $index_res['now_showing'][$i];
                    $release_time = new \DateTime($movie->released, new \DateTimeZone("UTC"));
                    $release_time->setTimezone(new \DateTimeZone(TIMEZONE));
                    $release_time_str = $release_time->format('Y-m-d');
                    //$movie_release = new \DateTime($movie->release, $)
                    echo '<div class="col-3 d-flex flex-wrap justify-content-center searched-item">
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
        <div class="col-12 future-release mt-5">
            <div class="titlebar">
                <div>即將上映-></div>
                <hr />
            </div>
            <div class="row">
                <?php
                for($i = 0; $i < count($index_res['next_stage']); $i++) {
                    $movie = $index_res['next_stage'][$i];
                    $release_time = new \DateTime($movie->released, new \DateTimeZone("UTC"));
                    $release_time->setTimezone(new \DateTimeZone(TIMEZONE));
                    $release_time_str = $release_time->format('Y-m-d');

                    echo '<div class="col-3 d-flex justify-content-start">
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
    </div>
</div>