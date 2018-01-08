<div class="container">
    <div class="row justify-content-center">
    	<?php
        if(!isset($my_ticket_res['orders'])) {
            echo '<div>您目前沒有購買票卷歐</div>';
        }
    	foreach ($my_ticket_res['orders'] as $orders) {
    		$ticket = new \Data\Ticket($orders['ticket_id']);
    		$movie = new \Data\Movie($ticket->movie_id);
    	
    	echo '<div class="col-9 my-ticket p-4 my-5">
            <div class="row">
                <div class="col-2">
                    <img class="img-responsive" src="./imgs/movie/' . $movie->poster . '" />
                </div>
                <div class="col-7 pl-5">
                    <div class="d-flex movie-title align-items-center mb-2">
                        <div>
                            <div class="zh">' . $movie->zh_name . '</div>
                            <div class="en">' . $movie->en_name . '</div>
                        </div>
                        <img class="my-1 mx-3" src="imgs/rating-' . $movie->rating . '.png">
                    </div>
                    <div class="d-flex mt-5">
                        <div class="pr-3">時間：' . \Tools\Date::toFormat(\Tools\Date::toTimeZone(\Tools\Date::toDateTime($ticket->showing_time)), 'Y/m/d') . '</div>
                        <div class="pr-3">場次：' . \Tools\Date::toFormat(\Tools\Date::toTimeZone(\Tools\Date::toDateTime($ticket->showing_time)), 'H:i') . '</div>
                        <div class="pr-3">' . $ticket->hall . '廳</div>
                    </div>
                    <div class="d-flex mt-4">
                    	<div class="pr-3">座位：自由入座</div>
                    	<div class="pr-3">張數：' . $orders['num'] . '</div>
                	</div>
                </div>
                <div class="col-3 align-self-end">
                	<div class="row">
                		<div class="col-12 text-right">' . \Tools\Date::toFormat(\Tools\Date::toTimeZone(\Tools\Date::toDateTime($orders['created_at'])), 'Y/m/d H:i:s') . '</div>
                	</div>
                </div>
            </div>
        </div>';
        }
    	?>
    </div>
</div>