		<div class="content">
				<div class="panel-header bg-warning-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">Bariki Ngopi</h2>
								<img src="<?php echo base_url(); ?>/assets/dist/img/tagline.png" width="50%" style="margin-top: -12%; margin-left: -2%">
							</div>
							<div class="ml-md-auto py-2 py-md-0">
								<!--<button type="button" class="btn btn-white btn-border btn-round mr-2" data-toggle="modal" data-target="#addMenu">Tambah Menu</button>-->
								<?php if ($this->session->userdata('cart') == null): ?>
									<a class="btn btn-primary btn-round" href="<?php echo base_url('checkOut') ?>"><i class="fas fa-shopping-cart"></i>&nbsp;&nbsp;Check Out</a>
								<?php else: ?>
									<a class="btn btn-primary btn-round" href="<?php echo base_url('checkOut') ?>"><i class="fas fa-shopping-cart"></i>&nbsp;&nbsp;Check Out <?php echo count($this->session->userdata('cart')); ?></a>
								<?php endif ?>
								
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
							<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>admin/addtocart">
							<div class="card-body pt-2">
								<input type="hidden" name="id" value="<?php echo $item->id; ?>">
								<input type="hidden" name="nama" value="<?php echo $item->nama; ?>">
								<input type="hidden" name="harga" value="<?php echo $item->harga; ?>">
								<h4 class="mb-1 fw-bold"><?php echo $item->nama; ?></h4>
								<p class="text-muted small mb-2"><?php echo "RP."." ".$item->harga; ?></p>
								<div class="avatar-group">
									
									<div class="mt-2 mr-2">
										<input type="number" name="jumlah" min="1" required>
									</div>
									<div class="">
										<button type="submit" class="btn btn-icon btn-round btn-success" name="AddtoCart" value="AddtoCart">
											<i class="fas fa-check"></i>
										</button>
									</div>
								</div>
							</div>
						</form>
						</div>
					</div>
					<?php $i++; endforeach; ?>
				</div>	
			</div>
