<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
<h3>Tambah Data Barang</h3>
<?php
	echo form_open('barang/insert');
?>
<table class="table table-order">
	<tr>
		<td width="120">Nama Barang</td>
		<td><div class="col-sm-4"><input type="text" name="nama_barang" class="form-control" value="" placeholder="Nama Barang"></td>
			</div>	</tr>
	<tr>
		<td>Kategori</td>
		<td><div class="col-sm-4"><select name="kategori" class="form-control">
			<?php
			foreach ($kategori as $k) {
				echo "<option value='$k->id'>$k->nama_kategori</option>";
			}
			?>
		</select></div></td>
	</tr>
	<tr>
		<td>Harga Barang</td>
		<td><div class="col-sm-4"><input type="text" name="harga" class="form-control" value="" placeholder="Harga"></td>
	</div></tr>
	<tr>
		<td colspan="2"><button type="submit" class="btn btn-primary" name="submit">Save</button>
		<?php echo anchor('barang','Back',array('class'=>'btn btn-primary')); ?></td>
	</tr>
</table>
</from>
</body>
</html>
