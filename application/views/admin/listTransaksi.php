<div class="content">
<div class="row p-4">
<div class="col-md-12">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Transaksi</h4>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table id="basic-datatables" class="display table table-striped table-hover" >
					<thead>
						<tr>
							<th>ID Transaksi</th>
							<th>Tanggal Order</th>
							<th>Nama Pembeli</th>
							<th>Total Bayar</th>
							<th>Action</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>ID Transaksi</th>
							<th>Tanggal Order</th>
							<th>Nama Pembeli</th>
							<th>Total Bayar</th>
							<th>Action</th>
						</tr>
					</tfoot>
					<tbody>
					 <?php $i=1; foreach ($detail as $item) : ?>
				        <tr>
				          <td><?php echo $item->id; ?></td>
				          <td><?php echo date("d-m-Y", strtotime($item->tgl_order));?></td>
				          <td><?php echo $item->nama_pembeli; ?></td>
				          <td><?php echo $item->total; ?></td>
				          <td><a href="<?php echo base_url('detailTransaksi/'.$item->id);?>" class="btn btn-icon btn-round btn-xs btn-info pt-1"><i class="fas fa-info"></i></a></td>
				        </tr>
				        <?php $i++; endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
</div>
</div>