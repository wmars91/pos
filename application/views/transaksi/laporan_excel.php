<table border="1">
	<tr>
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
		<td colspan="3">Total</td>
		<td><?php echo $total; ?></td>
	</tr>
</table>

