<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<h3>Kategori Barang</h3>
	<?php
		echo anchor('kategori/insert','Insert',array('class'=>'btn btn-danger btn-sm'));
	?> <br /><br />
	<table class="table table-bordered">
			<tr>
				<th>No</th>
				<th>Kategori Barang</th>
				<th colspan="2">operasi</th>
			</tr>
		<?php
		$No=1+$this->uri->segment(3);;
		foreach ($record->result() as $r) {
			echo "	<tr>
						<td width='10'>$No</td>
						<td>$r->nama_kategori</td>
						<td width='10'>".anchor('kategori/edit/'.$r->id,'Edit')."</td>
						<td width='10'>".anchor('kategori/delete/'.$r->id,'Delete')."</td>
					</tr>";
			$No++;
		}
	?>

	</table>	
	<?php
	echo $paging;
	?>


</body>
</html>

