			<!-- Main Content -->
			<div class="main-content">
				<section class="section">
					<div class="section-header">
						<h1>Pengajuan Kuliah</h1>
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
									<div class="col-md-6">
										<form method="POST" action="<?= base_url('mahasiswa/pengajuan/insert_pengajuan')?>"
											enctype="multipart/form-data">
											<div class="card-header">
												<h4>Form Pengajuan Kuliah</h4>
											</div>
											<div class="card-body">
												<div class="form-group">
													<label>NPM</label>
													<input type="text" name="npm" class="form-control" value="<?= $this->session->userdata('npm') ?>" readonly>
													<?= form_error('npm', '<div class="text-small text-danger">', '</div>'); ?>
												</div>
												<div class="form-group">
													<label>Nama Mahasiswa</label>
													<input type="text" name="nama" class="form-control" value='<?= $this->session->userdata('nama_mhs')?>' readonly>
													<?= form_error('nama', '<div class="text-small text-danger">', '</div>'); ?>
												</div>
												<div class="form-group">
													<label>Pengajuan Matakuliah</label>
													<textarea class="form-control" name="konten"
														rows="3"></textarea>
													<?= form_error('konten', '<div class="text-small text-danger">', '</div>'); ?>
												</div>
											</div>
											<div class="card-footer text-right">
												<button class="btn btn-danger" type="reset"> <i
														class="fa fa-undo mr-1"></i>Reset</button>
												<button class="btn btn-primary mr-2" type="submit"> <i
														class="fa fa-save mr-1">Save</i>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>