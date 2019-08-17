<style type="text/css">
	.table td, .table tr, .table th{
		border: 1px solid grey !important;
		height: 35px;
	}
	#table{
		width: 95%;
		margin: auto;
	}
</style>
<div class="content">
<div class="row p-4">
<div class="col-md-12">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Detail Transaksi</h4>
		</div>
		<div class="card-body">
			<div class="row mt-1">
				<div class="col-md-4">
					<div class="form-group form-group-default">
						<label>ID Transaksi</label>
						<input type="text" class="form-control" name="id" value="<?php echo $order->id;?>" placeholder="ID Transaksi">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group form-group-default">
						<label>Nama Pembeli</label>
						<input type="text" class="form-control" name="nama" value="<?php echo $detail->nama_pembeli; ?>" placeholder="Phone">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group form-group-default">
						<label>Tanggal Order</label>
						<input type="text" class="form-control" name="tgl_order" value="<?php echo $detail->tgl_order; ?>" placeholder="Tanggal Order">
					</div>
				</div>
			</div>
				<table class="display table table-striped table-hover" id="table">
						<tr>
							<th>Nama</th>
							<th>Jumlah</th>
							<th>Harga</th>
							<th>Total Harga</th>
						</tr>
					 <?php $i=1; foreach ($detail1 as $item) : ?>
				        <tr>
				          <td><?php echo $item->nama; ?></td>
				          <td><?php echo $item->jumlah; ?></td>
				          <td><?php echo $item->harga; ?></td>
				          <td><?php echo $item->total_harga; ?></td>
				        </tr>
				        <?php $i++; endforeach; ?>
				</table>
			<div class="row mt-3">
				<div class="col-md-4">
					<div class="form-group form-group-default">
						<label>Total</label>
						<input type="text" class="form-control" name="total" value="<?php echo $order->total; ?>" placeholder="Total">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group form-group-default">
						<label>Tunai</label>
						<input type="text" class="form-control" name="bayar" value="<?php echo $order->bayar; ?>" placeholder="Tunai">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group form-group-default">
						<label>Kembali</label>
						<input type="text" class="form-control" name="kembali" value="<?php echo $order->kembali; ?>" placeholder="Kembali">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>