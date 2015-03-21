<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<h3>Operator Sistem</h3>
	<?php
		echo anchor('operator/insert','Insert',array('class'=>'btn btn-danger'));
	?> <br /><br />
	<table class="table table-bordered">
			<tr>
				<th>No</th>
				<th>Nama Lengkap</th>
				<th>Username</th>
				<th>last Login</th>
				<th colspan="2">operasi</th>
			</tr>
		<?php
		$No=1;
		foreach ($record->result() as $r) {
			echo "	<tr>
						<td width=20>$No</td>
						<td>$r->nama_lengkap</td>
						<td>$r->username</td>
						<td>$r->last_login</td>
						<td width=20>".anchor('operator/edit/'.$r->id_operator,'Edit')."</td>
						<td width=20>".anchor('operator/delete/'.$r->id_operator,'Delete')."</td>
					</tr>";
			$No++;
		}
	?>

	</table>	


</body>
</html>

