			<!-- Main Content -->
			<div class="main-content">
				<section class="section">
					<div class="section-header">
						<h1>Mahasiswa</h1>
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
                                    <?php foreach($mahasiswa as $mhs): ?>
										<form method="POST" action="<?= base_url('BAAK/Mahasiswa/update_mahasiswa')?>" enctype="multipart/form-data">
											<div class="card-header">
												<h4>Form Mahasiswa</h4>
											</div>
											<div class="card-body">
												<div class="form-group">
													<label>NPM</label>
													<input type="text" name="npm" class="form-control" value="<?= $mhs->npm; ?>" readonly>
													<?= form_error('npm', '<div class="text-small text-danger">', '</div>'); ?>
												</div>
												<div class="form-group">
													<label>Nama</label>
													<input type="text" name="nama_mhs" class="form-control" value="<?= $mhs->nama_mhs; ?>">
													<?= form_error('nama_mhs', '<div class="text-small text-danger">', '</div>'); ?>
												</div>
                                                <div class="form-group">
													<label>Email</label>
													<input type="text" name="email" class="form-control" value="<?= $mhs->email; ?>">
													<?= form_error('email', '<div class="text-small text-danger">', '</div>'); ?>
												</div>
                                                <div class="form-group">
													<label>No Telp</label>
													<input type="text" name="no_telp" class="form-control" value="<?= $mhs->no_telp; ?>">
													<?= form_error('no_telp', '<div class="text-small text-danger">', '</div>'); ?>
												</div>	
                                                <div class="form-group mb-0">
													<label>Semester</label>
													<select class="form-control" name="semester">
														<option value="<?= $mhs->semester; ?>"> <?= $mhs->semester; ?> </option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
														<option value="6">6</option>
														<option value="7">7</option>
														<option value="8">8</option>
														<option value="9">9</option>
													</select>
													<?= form_error('semester', '<div class="text-small text-danger">', '</div>'); ?>
												</div>												
											</div>
											<div class="card-footer text-right">
												<button class="btn btn-danger" type="reset"> <i class="fa fa-undo mr-1"></i>Reset</button>
												<button class="btn btn-primary mr-2" type="submit"> <i class="fa fa-save mr-1">Save</i>
											</div>
										</form>
                                    <?php endforeach; ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>