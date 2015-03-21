<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<h3>Form Transaksi</h3>
	<?php
		echo form_open('transaksi');
	?>
	<table class="table table-bordered">
		<tr class="success"><th>Form Transaksi</th></tr>
		<tr>
			<td>
			<div class="col-sm-4">
				<input list="barang" name="barang" class="form-control" value="" placeholder="Masukan nama barang">
			</div>
			<div class="col-sm-1">
				<input type="text" name="qty" class="form-control" value="" placeholder="QTY">
			</div>
			</td>
		</tr>
		<tr>
			<td>
				<button type="submit" name="submit" class="btn btn-primary">Save</button>
				<?php echo anchor('transaksi/selesai_belanja','Finish',array('class'=>'btn btn-primary')); ?>
			</td>
		</tr>
	</table>
	</form>
	<table class="table table-bordered">
			<tr class="success">
				<th colspan="6">
					Detail Transaksi
				</th>
			</tr>
			<tr>
				<th>No</th>
				<th>Nama Barang</th>
				<th>Qty</th>
				<th>Harga</th>
				<th>Subtotal</th>
				<th>Cancel</th>
			</tr>	
			<?php
			$no=1;
			$total=0;
			foreach ($detail->result() as $d ) {
				echo "<tr>
							<td width='10'>$no</td>
							<td>$d->nama_barang</td>
							<td>$d->qty</td>
							<td>$d->harga</td>
							<td>".$d->qty*$d->harga."</td>
							<td>".anchor('transaksi/hapusitem/$d->detail_id','Hapus')."</td>
					  </tr>";
			$total = $total+($d->qty*$d->harga);
			$no++;
			}
		 	?>
			<tr>
				<td colspan="4" align="center"> <p align="rigth"><b>Total</b></p></td>
				<td><?php echo $total ?></td>
			</tr>	
	</table>	

	<datalist id="barang">
		<?php
			foreach ($record->result() as $b ) {
				echo "<option value='$b->nama_barang'></option>";
			}
		 ?>
		
	</datalist>
</body>
</html>
