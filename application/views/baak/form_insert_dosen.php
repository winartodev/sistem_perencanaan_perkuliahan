			<!-- Main Content -->
			<div class="main-content">
				<section class="section">
					<div class="section-header">
						<h1>Dosen</h1>
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
										<form method="POST" action="<?= base_url('baak/dosen/insert_dosen')?>" enctype="multipart/form-data">
											<div class="card-header">
												<h4>Form Dosen</h4>
											</div>
											<div class="card-body">
												<div class="form-group">
													<label>NIK Dosen</label>
													<input type="text" name="kode_dosen" class="form-control">
													<?= form_error('kode_dosen', '<div class="text-small text-danger">', '</div>'); ?>
												</div>
												<div class="form-group">
													<label>Nama Dosen</label>
													<input type="text" name="nama_dosen" class="form-control">
													<?= form_error('nama_dosen', '<div class="text-small text-danger">', '</div>'); ?>
												</div>
                                                <div class="form-group">
													<label>Email</label>
													<input type="text" name="email" class="form-control">
													<?= form_error('email', '<div class="text-small text-danger">', '</div>'); ?>
												</div>
                                                <div class="form-group">
													<label>No Telp</label>
													<input type="text" name="no_telp" class="form-control">
													<?= form_error('no_telp', '<div class="text-small text-danger">', '</div>'); ?>
												</div>												
											</div>
											<div class="card-footer text-right">
												<button class="btn btn-danger" type="reset"> <i class="fa fa-undo mr-1"></i>Reset</button>
												<button class="btn btn-primary mr-2" type="submit"> <i class="fa fa-save mr-1">Save</i>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>