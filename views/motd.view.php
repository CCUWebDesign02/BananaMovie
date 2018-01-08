<div class="container">
	<?php 
	use \Data\Motd;
	$motd = new \Data\Motd($_GET['id']);
	echo '<h1>' . $motd->title . '</h1>';
	echo '<div> . $motd->content . </div>';
	?>
</div>