			<!-- Main Content -->
			<div class="main-content">
				<section class="section">
					<div class="section-header">
						<h1>Keilmuan</h1>
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
										<?php foreach($keilmuan as $_keilmuan):?>
										<form method="POST" action="<?= base_url('Kaprodi/keilmuan/update_keilmuan')?>"
											enctype="multipart/form-data">
											<div class="card-header">
												<h4>Form Edit Keahlian Dosen</h4>
											</div>
											<div class="card-body">
												<div class="form-group">
													<label>Dosen</label>
                                                    <input type="text" name="id_keilmuan" class="form-control" value="<?=$_keilmuan->id_keilmuan ?>" hidden>
													<select class="form-control" name="kode_dosen">
														<option value="<?= $_keilmuan->kode_dosen?>"><?= $_keilmuan->nama_dosen?>
														</option>
														<?php $no = 1; foreach($dosen as $_dosen): ?>
														<option value="<?= $_dosen->kode_dosen ?>">
															<?=$_dosen->kode_dosen,". ", $_dosen->nama_dosen; ?></option>
														<?php endforeach; ?>
													</select>
													<?= form_error('kode_dosen', '<div class="text-small text-danger">', '</div>'); ?>
												</div>
												<div class="form-group">
													<label>Bidang Ilmu</label>
													<select class="form-control" name="bidang_ilmu">
														<option value="<?= $_keilmuan->bidang_ilmu?>">
															<?= $_keilmuan->bidang_ilmu?></option>
														<option value="Teknik Informatika">Teknik Informatika</option>
													</select>
													<?= form_error('bidang_ilmu', '<div class="text-small text-danger">', '</div>'); ?>
												</div>
												<div class="form-group">
													<label>Matakuliah</label>
													<select class="form-control" name="kode_mk">
														<option value="<?= $_keilmuan->kode_mk?>"><?= $_keilmuan->nama_mk?>
														</option>
														<?php $no = 1; foreach($matakuliah as $_matakuliah): ?>
														<option value="<?= $_matakuliah->kode_mk ?>">
															<?=$no++,". ", $_matakuliah->nama_mk; ?></option>
														<?php endforeach; ?>
													</select>
													<?= form_error('kode_mk', '<div class="text-small text-danger">', '</div>'); ?>
												</div>
											</div>
											<div class="card-footer text-right">
												<button class="btn btn-danger" type="reset"> <i
														class="fa fa-undo mr-1"></i>Reset</button>
												<button class="btn btn-primary mr-2" type="submit"> <i
														class="fa fa-save mr-1">Save</i>
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