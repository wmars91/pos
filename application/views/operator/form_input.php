<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
<h3>Tambah Operator</h3>
<?php
	echo form_open('operator/insert');
?>
<table class="table table-order">
	<tr>
		<td width="120">Nama Lengkap</td>
		<td>
			<div class="col-sm-4">
			<input type="text" name="nama" class="form-control" value="" placeholder="Nama Lengkap">
			</div>
		</td>
	</tr>
	<tr>
		<td>Username</td>
		<td>
			<div class="col-sm-4">
			<input type="text" name="username" class="form-control" value="" placeholder="Username">
			</div>
		</td>
	</tr>
	<tr>
		<td>Password</td>
		<td>
			<div class="col-sm-4">
			<input type="password" name="password" class="form-control" value="" placeholder="Password">
			</div>
		</td>
	</tr>
	<tr>
		<td colspan="2"><button type="submit" class="btn btn-primary" name="submit">Save</button>
		<?php echo anchor('operator','Back',array('class'=>'btn btn-primary')); ?></td>
	</tr>
</table>
</from>
</body>
</html>
