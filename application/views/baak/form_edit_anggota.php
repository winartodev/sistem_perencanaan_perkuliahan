			<!-- Main Content -->
			<div class="main-content">
				<section class="section">
					<div class="section-header">
						<h1>Anggota BAAK</h1>
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
                                    <?php foreach($baak as $_baak): ?>
										<form method="POST" action="<?= base_url('baak/anggota/update_anggota')?>" enctype="multipart/form-data">
                                            <div class="card-header">
                                                <h4>Form Data Anggota</h4>
                                            </div>
											<div class="card-body">
												<div class="form-group">
													<label>id</label>
													<input type="text" name="id" class="form-control" value="<?= $_baak->id; ?>">
													<?= form_error('id', '<div class="text-small text-danger">', '</div>'); ?>
												</div>
												<div class="form-group">
													<label>Nama</label>
													<input type="text" name="nama" class="form-control" value="<?= $_baak->nama; ?>">
													<?= form_error('nama', '<div class="text-small text-danger">', '</div>'); ?>
												</div>
                                                <div class="form-group">
													<label>Email</label>
													<input type="text" name="email" class="form-control" value="<?= $_baak->email; ?>">
													<?= form_error('email', '<div class="text-small text-danger">', '</div>'); ?>
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