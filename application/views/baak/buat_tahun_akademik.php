<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Tahun Akademik</h1>
		</div>
		<div class="section-body">
			<?= $this->session->flashdata('pesan'); ?>
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-md-6">
							<form method="POST" action="<?= base_url('baak/tahunakademik/insert_tahun_akademik')?>"
								enctype="multipart/form-data">
								<div class="card-body">
									<div class="form-group">
										<label>Tahun Akademik</label>
										<select class="form-control" name="tahun_akademik">
											<option value="">Pilih Tahun Akademik</option>
											<option value="2019">2019</option>
											<option value="2020">2020</option>
											<option value="2021">2021</option>
										</select>
										<?= form_error('tahun_akademik', '<div class="text-small text-danger">', '</div>'); ?>
									</div>
									<div class="form-group">
										<label>Semester</label>
										<select class="form-control" name="semester">
											<option value="">Pilih Semester</option>
											<option value="Ganjil">Ganjil</option>
											<option value="Genap">Genap</option>
										</select>
										<?= form_error('semester', '<div class="text-small text-danger">', '</div>'); ?>
									</div>
									<div class="card-footer text-right">
										<button class="btn btn-danger" type="reset"> <i
												class="fa fa-undo mr-1"></i>Reset</button>
										<button class="btn btn-primary mr-2" type="submit"> <i
												class="fa fa-save mr-1"></i>Save</button>

									</div>
								</div>

							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>