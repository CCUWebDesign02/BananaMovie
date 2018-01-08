<p><br></p>
<?php

	$dbFactory = new \Data\DataFactory();
	$db = $dbFactory->getDB();
	$user_id = $_SESSION['user_id'];
	$r = $db->query("SELECT account FROM users WHERE id = $user_id");
	$account = $r->fetch()['account'];
	$q = $db->query("SELECT * FROM `customer complaints` WHERE user_id = $user_id");

?>
<div class="container">
<h1 class="text-center">與客服聯絡</h1>
<hr>
<form  method="post" action="./complaint_post.php" enctype="multipart/form-data">
  <div class="form-group">
    <label for="moviename">會員帳號:</label>
    <input type="text" class="form-control" name="date" value="<?php echo $account; ?>" readonly="readonly"/>
  </div>
  <div class="form-group">
    <label for="comment">留言:</label>
    <textarea class="form-control" rows="12" name="announce"></textarea>
  </div>
  <input type="submit" class="btn btn-default" value="上傳" />
</form>
</div>