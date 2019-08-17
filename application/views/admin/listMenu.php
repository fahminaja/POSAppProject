			<div class="content">
				<div class="panel-header bg-warning-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">Bariki Ngopi</h2>
								<img src="<?php echo base_url(); ?>/assets/dist/img/tagline.png" width="50%" style="margin-top: -12%; margin-left: -2%">
							</div>
							<div class="ml-md-auto py-2 py-md-0">
								<button type="button" class="btn btn-white btn-border btn-round mr-2" data-toggle="modal" data-target="#addMenu">Tambah Menu</button>
								<a href="<?php echo base_url('deletedMenu')?>"><button type="button" class="btn btn-white btn-border btn-round mr-2">Menu Terhapus</button></a>
							</div>
						</div>
					</div>
				</div>

				<div class="row ml-2">
				<?php $i=1; foreach ($menu as $item) : ?>
					<div class="col-md-3 mt-4">
						<div class="card">
							<div class="p-2">
								<img class="card-img-top rounded" style="height:150px; width:235px" src="<?php if($item->kategori == 'Makanan'){echo base_url('./assets/dist/img/food.jpg');}else {echo base_url('./assets/dist/img/coffe.jpg');};?>" alt="Product 1">
							</div>
							<div class="card-body pt-2">
								<h4 class="mb-1 fw-bold"><?php echo $item->nama; ?></h4>
								<p class="text-muted small mb-2"><?php echo "RP."." ".$item->harga; ?></p>
								<div class="avatar-group">
									<div class="avatar avatar-sm">
										<button type="button" class="btn btn-icon btn-round btn-info" data-toggle="modal" data-target="#detailMenu<?php echo $item->id?>">
											<i class="fa fa-info"></i>
										</button>
									</div>
									<div class="avatar avatar-sm">
										<button type="button" class="btn btn-icon btn-round btn-danger" style="margin-left: 20px" data-toggle="modal" data-target="#deleteMenu<?php echo $item->id?>">
											<i class="fa fa-trash"></i>
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php $i++; endforeach; ?>
				</div>	
			</div>

			<div class="modal fade" id="addMenu" tabindex="-1" role="dialog" aria-labelledby="addMenu" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h2 class="modal-title" id="addMenu">Tambah Menu</h2>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form class="form-horizontal" method="post">
						<div class="modal-body">
						<div class="form-group">
							<label for="pillInput">Nama Makanan/Minuman</label>
							<input type="text" class="form-control input-pill" name="nama" placeholder="Masukkan nama makanan atau minuman">
						</div>
						<div class="form-group">
							<label for="pillSelect">Pill Select</label>
							<select class="form-control input-pill" name="kategori">
								<option>Makanan</option>
								<option>Minuman</option>
							</select>
						</div>
						<div class="form-group">
							<label for="pillInput">Harga</label>
							<input type="text" class="form-control input-pill" name="harga" placeholder="Masukkan harga makanan atau minuman">
						</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-success btn-border" data-dismiss="modal">Tutup</button>
							<button type="submit" class="btn btn-success" name="addMenu" value="addMenu">Tambah</button>
						</div>
						</form>
					</div>
				</div>
			</div>
			<?php foreach ($menu as $produk): ?>
				<div class="modal fade" id="detailMenu<?php echo $produk->id;?>" tabindex="-1" role="dialog" aria-labelledby="addMenu" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h2 class="modal-title" id="addMenu">Detail Menu</h2>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form class="form-horizontal" method="post">
						<div class="modal-body">
						<input type="hidden" name="id" value="<?php echo $produk->id; ?>">
						<div class="form-group">
							<label for="pillInput">Nama Makanan/Minuman</label>
							<input type="text" class="form-control input-pill" name="nama" value="<?php echo $produk->nama; ?>" placeholder="Masukkan nama makanan atau minuman">
						</div>
						<div class="form-group">
							<label for="pillSelect">Pill Select</label>
							<select class="form-control input-pill" name="kategori">
								<option <?php if ($produk->kategori == 'Makanan'): ?>
									<?php echo 'selected' ?>
								<?php endif ?>>Makanan</option>
								<option <?php if ($produk->kategori == 'Minuman'): ?>
									<?php echo 'selected' ?>
								<?php endif ?>>Minuman</option>
							</select>
						</div>
						<div class="form-group">
							<label for="pillInput">Harga</label>
							<input type="text" class="form-control input-pill" name="harga" value="<?php echo $produk->harga; ?>" placeholder="Masukkan harga makanan atau minuman">
						</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-warning btn-border" data-dismiss="modal">Tutup</button>
							<button type="submit" class="btn btn-warning" name="updateMenu" value="updateMenu">Ubah</button>
						</div>
						</form>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
		
		<?php foreach ($menu as $prod): ?>
			<div class="modal fade" id="deleteMenu<?php echo $prod->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h2 class="modal-title" id="exampleModalLongTitle">Peringatan</h2>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form class="form-horizontal" method="post">
						<div class="modal-body">
						<input type="hidden" name="id" value="<?php echo $prod->id; ?>">
						Apakah anda yakin akan menghapus?
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger btn-border" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-danger" name="deleteMenu" value="deleteMenu">Hapus</button>
						</div>
						</form>
					</div>
				</div>
			</div>
			<?php endforeach; ?>

