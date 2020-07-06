			<!-- Main Content -->
			<div class="main-content">
				<section class="section">
					<div class="section-header">
						<h1>Kelas</h1>
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
										<form method="POST" action="<?= base_url('kaprodi/kelas/insert_kelas')?>" enctype="multipart/form-data">
											<div class="card-header">
												<h4>Form Kelas</h4>
											</div>
											<div class="card-body">
												<div class="form-group">
													<label>Nama Kelompok</label>
													<select class="form-control" name="kode_kelompok">
														<option value="">Pilih Kelompok</option>
                                                        <?php foreach($kelompok as $_kelompok): ?>
														    <option value="<?= $_kelompok->kode_kelompok ?>"><?= $_kelompok->nama_kelompok; ?></option>
                                                        <?php endforeach; ?>
													</select>
													<?= form_error('kode_kelompok', '<div class="text-small text-danger">', '</div>'); ?>
												</div>
												<div class="form-group">
													<label>Matakuliah</label>
													<select class="form-control" name="kode_mk">
														<option value="">Pilih Mata Kuliah</option>
                                                        <?php $no = 1; foreach($matakuliah as $_matakuliah): ?>
														    <option value="<?= $_matakuliah->kode_mk ?>"><?=$no++,". ", $_matakuliah->nama_mk; ?></option>
                                                        <?php endforeach; ?>
													</select>
													<?= form_error('kode_mk', '<div class="text-small text-danger">', '</div>'); ?>
												</div>
                                                <div class="form-group">
													<label>Dosen</label>
													<select class="form-control" name="kode_dosen">
														<option value="">Pilih Dosen</option>
                                                        <?php $no = 1; foreach($dosen as $_dosen): ?>
														    <option value="<?= $_dosen->kode_dosen ?>"><?=$_dosen->kode_dosen,". ", $_dosen->nama_dosen; ?></option>
                                                        <?php endforeach; ?>
													</select>
													<?= form_error('kode_dosen', '<div class="text-small text-danger">', '</div>'); ?>
												</div>
                                                <div class="form-group">
													<label>Angkatan</label>
													<select class="form-control" name="angkatan">
														<option value="">Pilih Angkatan</option>
														<option value="15">15</option>
														<option value="16">16</option>
														<option value="17">17</option>
														<option value="18">18</option>
													</select>
													<?= form_error('angkatan', '<div class="text-small text-danger">', '</div>'); ?>
												</div>
                                                <div class="form-group">
													<label>Nama Kelas</label>
													<input type="text" name="nama_kelas" class="form-control" placeholder="ex : A, B, C, Gab TK">
													<?= form_error('nama_kelas', '<div class="text-small text-danger">', '</div>'); ?>
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