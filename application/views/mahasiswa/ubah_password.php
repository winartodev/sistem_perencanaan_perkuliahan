<div class="main-content">
	<section class="section">
		<div class="section-header">
			<h1>Ubah Password Mahasiswa</h1>
		</div>
		<div class="section-body">
        <?= $this->session->flashdata('pesan'); ?>
			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-md-6">
							<form method="POST" action="<?= base_url('mahasiswa/biodata/update_password')?>"
								enctype="multipart/form-data">
								<div class="card-body">
									<div class="form-group">
										<label>Password</label>
										<input type="password" name="pass" class="form-control">
									</div>
									<div class="card-footer text-right">
										<button class="btn btn-primary mr-2" type="submit"> <i
												class="fa fa-save mr-1"></i> Save
									</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>