<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
<h3>Lihat Data Barang</h3>

<?php
		echo anchor('barang/insert','Insert',array('class'=>'btn btn-danger'));
?>
<br><br>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Barang</th>
				<th>Kategori Barang</th>
				<th>Harga</th>
				<th colspan="2">Operasi</th>
			</tr>
		</thead>
		<?php
		$No=1+$this->uri->segment(3);
		foreach ($record->result() as $r) {
			echo "	<tr>
						<td width=30>$No</td>
						<td>$r->nama_barang</td>
						<td>$r->nama_kategori</td>
						<td>$r->harga</td>
						<td width=20>".anchor('barang/edit/'.$r->id_barang,'Edit')."</td>
						<td width=20>".anchor('barang/delete/'.$r->id_barang,'Delete')."</td>
					</tr>";
			$No++;
		}
	?>
	</table>	
	</table>	
	
	<?php
	echo $paging;
	?>
	
</body>
</html>
