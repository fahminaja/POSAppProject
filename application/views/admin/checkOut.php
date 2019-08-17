<style type="text/css">
	.table td, .table th{
		border: 1px solid grey !important;

	}
	#kembali{
		background-color: white !important;
		color: black !important;
	}
</style>
<div class="content">
	<div class="page-inner">
		<form method="post" action="<?php echo base_url(); ?>admin/savecheckout">
		<div class="row">
			<div class="col-md-12">
				<a class="btn btn-primary btn-round mb-4" href="<?php echo base_url('orderMenu') ?>">Order Kembali</a>
				<a class="btn btn-danger btn-round mb-4" href="<?php echo base_url('RemoveCart') ?>">Reset Order</a>
			</div>
			<div class="col-md-7">
				<div class="card">
					<div class="card-header">
						Pesanan
					</div>
					<div class="card-body">
						<table class="table table-striped table-bordered">
							<tr>
								<th>Nama Makanan</th>
								<th>Harga Satuan</th>
								<th width="10">Jumlah</th>
								<th>Sub Total</th>
								<th>Action</th>
							</tr>
							<?php $subtotal = 0; ?>
							<?php if (empty($pesan)): ?>
								<tr>
									<td colspan="5">
										Belum ada menu yang dipesan
									</td>
								</tr>
							<?php else: ?>
								<?php foreach ($pesan as $id => $order): ?>
								<?php 
									$total_item = $order['harga'] * $order['jumlah'];
									$subtotal += $total_item;
								 ?>
								
								<tr>
									<td><?php echo $order['nama_produk']; ?></td>
									<td><?php echo $order['harga']; ?></td>
									<td><?php echo $order['jumlah']; ?></td>
									<td><?php echo $total_item; ?></td>
									<td><a href="<?php echo base_url(); ?>admin/removeitem/<?php echo $id ;?>" class="btn btn-icon btn-round btn-xs btn-danger pt-1"><i class="fas fa-trash"></i></a></td>
								</tr>
							<?php endforeach ?>
								<tr>
									<td colspan="3">Total</td>
									<td colspan="2">
										Rp <?php echo number_format($subtotal,0,"","."); ?>
										<input type="hidden" id="total" name="total" value="<?php echo $subtotal; ?>">
									</td>
								</tr>
							<?php endif ?>
							
						</table>
					</div>
				</div>			
			</div>
			<div class="col-md-5">
				<div class="card">
					<div class="card-header">
						Pembayaran
					</div>
					<div class="card-body">
						<div class="form-group">
							<label for="pillInput">Nama Pembeli</label>
							<input type="text" class="form-control input-pill" name="nama_pembeli" placeholder="Masukkan nama pembeli" required="">
						</div>
						<div class="form-group">
							<label for="pillInput">Jumlah Bayar</label>
							<input type="text" class="form-control input-pill" id="bayar" name="bayar" required="">
						</div>
						<div class="form-group">
							<label for="pillInput">Jumlah Kembali</label>
							<input type="text" class="form-control input-pill" id="kembali" name="kembali" readonly="">
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-success btn-border btn-round mb-4" name="SaveCheckOut" value="SaveCheckOut">Bayar</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		</form>
	</div>
</div>