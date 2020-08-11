			<!-- Main Content -->
			<div class="main-content">
				<section class="section">
					<div class="section-header">
						<h1>Tahun Akademik</h1>
						<!-- <div class="section-header-breadcrumb">
							<div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
							<div class="breadcrumb-item"><a href="#">Modules</a></div>
							<div class="breadcrumb-item">Mata Kuliah</div>
						</div> -->
					</div>

					<div class="section-body">
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col-md-12">
                                        <?= $this->session->flashdata('pesan'); ?>
                                        <br>
                                        <?= $this->session->flashdata('check_tahun_akademik'); ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>