<?php
	var_dump($_REQUEST);  //посмотреть что отправляет форма
?>

<form method="post">
	<div class="form-group">
		<input type="text" name="my_name">
	</div>
	<div class="form-group">
		<input type="email" name="my_email">
	</div>
	<textarea name="text"></textarea>

	<input type="submit" value="Send" class="btn btn-primary">
</form>