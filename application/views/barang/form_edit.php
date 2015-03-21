<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
<h3>Edit Data Barang</h3>
<?php
	echo form_open('barang/edit');
?>
<input type="hidden" name="id_barang" value="<?php echo "$record[id_barang]"; ?>">
<table class="table table-order">
	<tr>
		<td>Nama Barang</td>
		<td><div class="col-sm-4"><input type="text" name="nama_barang" class="form-control" value="<?php echo "$record[nama_barang]"; ?>" placeholder="Nama Barang"></td>
			</div></tr>
	<tr>
		<td>Kategori</td>
		<td><div class="col-sm-4"><select name="kategori" class="form-control" >
			<?php
			foreach ($kategori as $k) {
				echo "<option value='$k->id'";
				echo $record['kategori_id'] == $k->id?'selected':'';
				echo ">$k->nama_kategori</option>";
			}
			?>
		</select></div></td>
	</tr>
	<tr>
		<td>Harga Barang</td>
		<td><div class="col-sm-4"><input type="text" name="harga" value="<?php echo "$record[harga]"; ?>" class="form-control" placeholder="Harga"></td>
		</div></tr>
	<tr>
		<td colspan="2"><button class="btn btn-primary" type="submit" name="submit">Save</button>
		<?php echo anchor('barang','Back',array('class'=>'btn btn-primary')); ?></td>
	</tr>
</table>
</from>
</body>
</html>
