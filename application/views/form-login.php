<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login</title>
	<link rel="stylesheet" href="">
</head>
<body>

	<?php
		echo form_open('auth/login');
	?>

	<div class="col-sm-4">
		<input type="text" name="username" class="form-control" value="" placeholder="Username">
	</div>
	<div class="col-sm-4">
		<input type="password" name="password" class="form-control" value="" placeholder="Password">
	</div>
	<div class="col-sm-4">
		<button type="submit" class="btn btn-primary" name="submit">Login</button>
	</div>
	</form>
	
</body>
</html>
