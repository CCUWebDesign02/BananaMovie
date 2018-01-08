<div class="container">
	<?php 
	use \Data\Motd;
	$motd = new \Data\Motd($_GET['id']);
	echo '<h1 class="text-center my-2">' . $motd->title . '</h1>';
	echo '<hr />';
	echo '<div>' . $motd->content . '</div>';
	?>
</div>