			<!-- Main Content -->
			<div class="main-content">
				<section class="section">
					<div class="section-header">
						<h1>Tahun Akademik</h1>
					</div>

					<div class="section-body">
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col-md-6">
                                    <?php foreach($tanggal_akademik as $_tanggal_akademik): ?>
										<form method="POST" action="<?= base_url('baak/penginputan/update_tanggal_akademik')?>" enctype="multipart/form-data">
                                            <div class="card-header">
                                                <h4>Form Ubah Tanggal Akademik</h4>
                                            </div>
											<div class="card-body">
												<div class="form-group">
													<label>Tanggal Mulai Penginputan Akademik</label>
                                                    <input type="text" name="id_penginputan" class="form-control" value="<?= $_tanggal_akademik->id_penginputan ?>" hidden>
													<input type="date" name="tanggal_mulai" class="form-control" value="<?= $_tanggal_akademik->tanggal_mulai ?>">
													<?= form_error('tanggal_mulai', '<div class="text-small text-danger">', '</div>'); ?>
												</div>
                                                <div class="form-group">
													<label>Tanggal Akhir Penginputan Akademik</label>
													<input type="date" name="tanggal_akhir" class="form-control" value="<?= $_tanggal_akademik->tanggal_akhir ?>">
													<?= form_error('tanggal_akhir', '<div class="text-small text-danger">', '</div>'); ?>
												</div>										
											</div>
											<div class="card-footer text-right">
												<button class="btn btn-danger" type="reset"> <i class="fa fa-undo mr-1"></i>Reset</button>
												<button class="btn btn-primary mr-2" type="submit"> <i class="fa fa-save mr-1"></i>Save</button>
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