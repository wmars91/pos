<!DOCTYPE html>
<html> 
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
<h3>Laporan Transaksi</h3>
<?php
	echo form_open('transaksi/laporan');
?>	
<table class="table table-order">
	<tr>
		<td>
		<div class="col-sm-2">
		<input type="text" name="tgl1" class="form-control" value="" placeholder="">
		</div>
		<div class="col-sm-2">
		<input type="text" name="tgl2" class="form-control" value="" placeholder="">
		</div>
		</td>
	</tr>
	<tr>
		<td>
			<input type="submit" name="submit" value="Submit" class="btn btn-primary" >
		</td>
	</tr>
</table>
</form>
<hr>
<table class="table table-bordered">
	<tr class="success">
		<th>No</th>
		<th width="150">Tanggal Transaksi</th>
		<th>Operator</th>
		<th>Total Transaksi</th>
	</tr>
	<tr>
		<?php
		$No=1;
		$total=0;
		foreach ($record->result() as $r) {
			echo "	<tr>
						<td width=30>$No</td>
						<td>$r->tanggal_transaksi</td>
						<td>$r->nama_lengkap</td>
						<td>$r->total</td>
					</tr>";
			$No++;
			$total=$total+$r->total;
		}
		?>
	</tr>
	<tr>
		<td colspan="3" align="center"><b>Total</b></td>
		<td><b><?php echo $total; ?></b></td>
	</tr>
</table>
</body>
</html>
