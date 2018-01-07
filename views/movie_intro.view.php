<div class="container introduce">
    <div class="row buying p-4 mb-4">
        <div class="col-md-1"></div>
        <div class="col-md-3 align-self-center">
            <img id="mimgs" src="imgs/movie/<?php echo $movie_intro_res['movie']->poster ?>">
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-6">
            <div class="row movie-title align-items-center mb-2">
                <div>
                    <div class="zh"><?php echo $movie_intro_res['movie']->zh_name ?></div>
                    <div class="en"><?php echo $movie_intro_res['movie']->en_name ?></div>
                </div>
                <?php
                if(isset($movie_intro_res['movie']->rating)) {
                    echo '<img class="my-1 mx-3" src="imgs/rating-' . $movie_intro_res['movie']->rating . '.png">';
                }
                ?>
            </div>
            <div class="row">
                <div class="timechartt px-2">時刻表</div>
                <div class="timechartb p-4">
                    <?php
                    if($movie_intro_res['time_table']) {
                    $time_table = $movie_intro_res['time_table'];
                    $date_key = array_keys($time_table);
                    for($i = 0; $i < count($date_key); $i++) {
                        echo '<div class="date">'. \Tools\Date::strToFormat($date_key[$i], 'm/d') . '</div>';
                        echo '<div class="d-flex flex-column">';
                        $hall_key = array_keys($time_table[$date_key[$i]]);
                        for($j = 0; $j < count($hall_key); $j++) {
                            echo '<div class="hall mr-5">' . $hall_key[$j] . '廳</div>';
                            echo '<div class="d-flex">';
                            foreach($time_table[$date_key[$i]][$hall_key[$j]] as $val) {
                                echo '<div class="time mr-4">' . \Tools\Date::strToFormat($val, 'H:i') . '</div>';
                            }
                            echo '</div>';
                        }
                        echo '</div>';
                        if($i != count($date_key) - 1) {
                            echo '<hr class="my-4">';
                        }
                    }
                    }
                    else {
                        echo '<div>目前無上映場次</div>';
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-1"></div>

        <div class="col-md-10 buy-select py-4">
            <div class="row">
                <div class="pb-2">立即購票</div>
                <div class="w-100"></div>
                <select class="px-2 ml-1 mr-4" name="ticket">
                    <?php
                    //echo count($movie_intro_res['all_tickets']);
                    for($i = 0; $i < count($movie_intro_res['all_tickets']); $i++) {
                        $ticket = $movie_intro_res['all_tickets'][$i];
                        $value = $ticket['id'];
                        $text = \Tools\Date::strToFormat($ticket['showing_time'], 'Y/m/d H:i');
                        if(isset($ticket['hall'])) {
                            $text .= ' ' . $ticket['hall'] . '廳';
                        }
                        echo '<option value="' . $value . '">' . $text . '</option>';
                    }
                    ?>
                </select>
                <!--<div class="px-1">日期:</div>
                <select class="px-2 ml-1 mr-4">
                    <option value="2018/1/12">2018/1/12</option>
                    <option value="2018/1/12">2018/1/14</option>
                </select>
                <div>廳:</div>
                <select class="px-2 ml-1 mr-4">
                    <option value="place5">5廳</option>
                </select>
                <div>場次:</div>
                <select class="px-2 ml-1 mr-4">
                    <option value="10:40">10:40</option>
                    <option value="14:40">14:40</option>
                    <option value="18:40">18:40</option>
                    <option value="22:40">22:40</option>
                </select>-->
                <div>張數:</div>
                <select class="px-2 ml-1 mr-4" name="num" onchange="calPrice(this.value)">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-6"></div>
        <div class="col-md-6 buy-confirm d-flex justify-content-around align-items-center">
            <button id="pay-btn">立即結帳</button>
            <button id="addcart-btn">加入購物車</button>
            <div id="price">260元</div>
        </div>
    </div>
    <div class="row mdetails">
        <div class="col-md-6">
            <div class="main-title py-3">電影資訊</div>
            <div class="">
                <div class="d-flex py-2">
                    <div class="pr-4">日期</div>
                    <div>
                    <?php
                    $release_time = new \DateTime($movie_intro_res['movie']->released, new \DateTimeZone("UTC"));
                    $release_time->setTimezone(new \DateTimeZone(TIMEZONE));
                    $release_time_str = $release_time->format('Y-m-d');
                    echo $release_time_str;
                    ?>
                    </div>
                </div>
                <div class="d-flex py-2">
                    <div class="pr-4">導演</div>
                    <div class="py-2"><?php echo $movie_intro_res['movie']->director ?></div>
                </div>
                <div class="d-flex py-2">
                    <div class="">演員</div>
                    <div class="py-2 pl-4 align-self-end"><?php echo $movie_intro_res['movie']->actors ?></div>
                </div>
            </div>
        </div>
        <div class="col-md-6 trailer">
            <div class="main-title py-3">電影預告</div>
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="<?php echo $movie_intro_res['movie']->trailer_url ?>" frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
            </div>
        </div>
        <div class="w-100"></div>
        <div class="col-md-12 story">
            <div class="main-title py-3">劇情介紹</div>
            <div class="story-body"><?php echo $movie_intro_res['movie']->intro ?></div>
        </div>
    </div>
</div>