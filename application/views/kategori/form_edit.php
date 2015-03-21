<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
<h3>Edit Kategori Barang</h3>


<?php
	echo form_open('kategori/edit');
?>
<input type="hidden" name="id" value="<?php echo $record['id']; ?>" >

<table class="table table-order">
	<tr>
		<td width="140">Nama Kategori</td>
		<td><div class="col-sm-4"><input type="text" name="kategori" class="form-control" value="<?php echo $record['nama_kategori'] ;?>" 
			placeholder="Nama Kategori" ></div> 
		</td>
	</tr>
	<tr>
		<td colspan="2"><button type="submit" name="submit" class="btn btn-primary">Save</button>
		<?php echo anchor('kategori','Back',array('class'=>'btn btn-primary')); ?></td>
	</tr>
</table>
</from>
	
</body>
</html>

