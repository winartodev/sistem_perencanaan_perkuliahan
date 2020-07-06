			<!-- Main Content -->
			<div class="main-content">
				<section class="section">
					<div class="section-header">
						<h1>Pengumuman</h1>
						<!-- <div class="section-header-breadcrumb">
							<div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
							<div class="breadcrumb-item"><a href="#">Modules</a></div>
							<div class="breadcrumb-item">Mata Kuliah</div>
						</div> -->
					</div>

					<div class="section-body">
						<div class="row">
							<div class="col-12">
								<div class="card">
									<form method="POST" action="<?= base_url('baak/pengumuman/insert_pengumuman')?>"
										enctype="multipart/form-data">
										<div class="card-header">
											<h4>Form Pengumuman</h4>
										</div>
										<div class="card-body">
											<div class="form-group row mb-4">
												<label
													class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul</label>
												<div class="col-sm-12 col-md-7">
													<input type="text" class="form-control" name="judul">
												</div>
											</div>
											<div class="form-group row mb-4">
												<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Date</label>
												<div class="col-sm-12 col-md-7">
													<input type="text" class="form-control datepicker" name="tanggal">
												</div>
											</div>
											<div class="form-group row mb-4">
												<label
													class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
												<div class="col-sm-12 col-md-7">
													<textarea class="summernote-simple" name="konten"></textarea>
												</div>
											</div>
											<div class="form-group row mb-4">
												<label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
												<div class="col-sm-12 col-md-7">
													<button class="btn btn-primary" type="submit">Simpan</button>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
