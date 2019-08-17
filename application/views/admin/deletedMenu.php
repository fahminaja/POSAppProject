			<div class="content">
				<div class="panel-header bg-warning-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">Bariki Ngopi</h2>
								<h4 class="text-white op-7 mb-2">" bar iki meh ning ndi ? "</h4>
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
								<form class="form-horizontal" method="post">
								<input type="hidden" name="id" value="<?php echo $item->id; ?>">
								<div class="avatar-group">
									<div class="avatar avatar-sm">
										<button type="submit" class="btn btn-icon btn-round btn-warning" value="restoreMenu" name="restoreMenu">
											<i class="fas fa-window-restore"></i>
										</button>
									</div>
								</div>
								</form>
							</div>
						</div>
					</div>
					<?php $i++; endforeach; ?>
				</div>	
			</div>
