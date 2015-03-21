<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
<h3>Tambah Kategori Barang</h3>
<?php
	echo form_open('kategori/insert');
?>
<table class="table table-order">
	<tr>
		<td width="140">Nama Kategori</td>
		<td><div class="col-sm-4"><input type="text" class="form-control" name="kategori" value="" placeholder="Nama Kategori"></div></td>
	</tr>
	<tr>
		<td colspan="2"><button type="submit" name="submit" class="btn btn-primary">Save</button>
		<?php echo anchor('kategori','Back',array('class'=>'btn btn-primary')); ?>
		</td>
	</tr>
</table>
</from>
</body>
</html>
