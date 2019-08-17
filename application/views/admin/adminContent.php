			<div class="content">
				<div class="panel-header bg-warning-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">Bariki Ngopi</h2>
								<img src="<?php echo base_url(); ?>/assets/dist/img/tagline.png" width="50%" style="margin-top: -12%; margin-left: -2%">
							</div>
						</div>
					</div>
				</div>
			<div class="page-inner mt--5">
					<div class="row mt--2">
						<div class="col-md-5">
							<div class="card full-height">
								<div class="card-body">
									<div class="card-title">Statistik Transaksi</div>
									<div class="card-category">Jumlah Transaksi</div>
									<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
										<div class="px-2 pb-2 pb-md-0 text-center">
											<div id="circles-1"></div>
											<h6 class="fw-bold mt-3 mb-0">Hari ini</h6>
										</div>
										<div class="px-2 pb-2 pb-md-0 text-center">
											<div id="circles-2"></div>
											<h6 class="fw-bold mt-3 mb-0">Bulan ini</h6>
										</div>
										<div class="px-2 pb-2 pb-md-0 text-center">
											<div id="circles-3"></div>
											<h6 class="fw-bold mt-3 mb-0">Tahun ini</h6>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-7">
							<div class="card full-height">
								<div class="card-body">
									<div class="card-title">Pendapatan</div>
									<div class="row py-3">
										<div class="col-md-4 d-flex flex-column justify-content-around">
											<div>
												<h6 class="fw-bold text-uppercase text-success op-8">Total Pendapatan</h6>
												<h3 class="fw-bold">Rp <?php echo number_format($income,'0','','.'); ?></h3>
											</div>
										</div>
										<div class="col-md-8">
											<div id="chart-container">
												<canvas id="totalIncomeChart"></canvas>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="page-inner mt--5">
				<div class="col-md-12 mt--2">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Grafik Jumlah Transaksi Perbulan</div>
								</div>
								<div class="card-body">
									<div class="chart-container"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
										<canvas id="lineChart" width="337" height="300" class="chartjs-render-monitor" style="display: block; width: 337px; height: 300px;"></canvas>
									</div>
								</div>
							</div>
						</div>
					</div>
			</div>