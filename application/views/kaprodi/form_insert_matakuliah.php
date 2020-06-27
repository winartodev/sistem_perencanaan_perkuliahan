			<!-- Main Content -->
			<div class="main-content">
				<section class="section">
					<div class="section-header">
						<h1>Mata Kuliah</h1>
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
										<form method="POST" action="<?= base_url('Kaprodi/Matakuliah/insert_mk')?>" enctype="multipart/form-data">
											<div class="card-header">
												<h4>Form Matakuliah</h4>
											</div>
											<div class="card-body">
												<div class="form-group">
													<label>Kode Mata Kuliah</label>
													<input type="text" name="kode_mk" class="form-control" value="<?= $kode_mk; ?>" readonly>
													<?= form_error('kode_mk', '<div class="text-small text-danger">', '</div>'); ?>
												</div>
												<div class="form-group">
													<label>Nama Mata Kuliah</label>
													<input type="text" name="nama_mk" class="form-control">
													<?= form_error('nama_mk', '<div class="text-small text-danger">', '</div>'); ?>
												</div>
												<div class="form-group">
													<label> Dosen </label>
													<select class="form-control" name="kode_dosen">
														<option value="">Pilih Dosen</option>
														<?php foreach($dosen as $dsn): ?>
															<option value="<?= $dsn->kode_dosen; ?>"><?= $dsn->nama_dosen; ?></option>
														<?php endforeach; ?>
													</select>
													<?= form_error('kode_dosen', '<div class="text-small text-danger">', '</div>'); ?>
												</div>
												<div class="form-group">
													<label>Jumlah SKS</label>
													<select class="form-control" name="sks">
														<option value="">Pilih Jumlah SKS</option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
													</select>
													<?= form_error('sks', '<div class="text-small text-danger">', '</div>'); ?>
												</div>
												<div class="form-group mb-0">
													<label>Semester</label>
													<select class="form-control" name="semester">
														<option value="">Pilih Semester</option>
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
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>