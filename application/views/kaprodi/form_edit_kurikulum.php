			<!-- Main Content -->
			<div class="main-content">
				<section class="section">
					<div class="section-header">
						<h1>Kurikulum</h1>
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
									<?php foreach($kurikulum as $_kurikulum): ?>
										<form method="POST" action="<?= base_url('kaprodi/kurikulum/update_kurikulum')?>"
											enctype="multipart/form-data">
											<div class="card-header">
												<h4>Form Edit Kurikulum</h4>
											</div>
											<div class="card-body">
												<div class="form-group">
													<label>Tahun Akademik</label>
													<input type="text" class="form-control" name="id_kurikulum" value="<?= $_kurikulum->id_kurikulum ?>" hidden>
													<select class="form-control" name="tahun_akademik">
														<option value="<?= $_kurikulum->id_ta ?>"><?= $_kurikulum->tahun_akademik?></option>
														<?php foreach($tahun_akademik as $_tahun_akademik): ?>
														<option value="<?= $_tahun_akademik->id_ta ?>">
															<?= $_tahun_akademik->tahun_akademik; ?></option>
														<?php endforeach; ?>
													</select>
													<?= form_error('tahun_akademik', '<div class="text-small text-danger">', '</div>'); ?>
												</div>
												<div class="form-group">
													<label>Angkatan</label>
													<select class="form-control" name="angkatan">
														<option value="<?= $_kurikulum->angkatan ?>"><?= $_kurikulum->angkatan ?></option>
														<option value="15">15</option>
														<option value="16">16</option>
														<option value="17">17</option>
														<option value="18">18</option>
													</select>
													<?= form_error('angkatan', '<div class="text-small text-danger">', '</div>'); ?>
												</div>
												<div class="form-group">
													<label>Semester</label>
													<select class="form-control" name="semester">
														<option value="<?= $_kurikulum->semester_kurikulum ?>"><?= $_kurikulum->semester_kurikulum ?></option>
														<option value="1">1</option>
														<option value="2">2</option>
														<option value="3">3</option>
														<option value="4">4</option>
														<option value="5">5</option>
														<option value="6">6</option>
														<option value="7">7</option>
														<option value="8">8</option>
													</select>
													<?= form_error('semester', '<div class="text-small text-danger">', '</div>'); ?>
												</div>
												<div class="form-group">
													<label>Matakuliah</label>
													<select class="form-control" name="kode_mk" id="matakuliah">
														<option value="<?= $_kurikulum->kode_mk ?>"><?= $_kurikulum->nama_mk ?></option>
														<?php foreach($matakuliah as $_matakuliah): ?>
														<option value="<?= $_matakuliah->kode_mk ?>">
															<?=$_matakuliah->kode_mk,". ", $_matakuliah->nama_mk; ?></option>
														<?php endforeach; ?>
													</select>
													<?= form_error('kode_mk', '<div class="text-small text-danger">', '</div>'); ?>
												</div>
												<div class="form-group">
													<label>Dosen</label>
                                                    <select class="form-control" name="kode_dosen" id="dosen">
                                                    </select>
													<?= form_error('kode_dosen', '<div class="text-small text-danger">', '</div>'); ?>
												</div>
											</div>
											<div class="card-footer text-right">
												<button class="btn btn-danger" type="reset"> <i
														class="fa fa-undo mr-1"></i>Reset</button>
												<button class="btn btn-primary mr-2" type="submit"> <i
														class="fa fa-save mr-1"></i>Save</button>
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

<script>
	$(document).ready(function() {
		filter_dosen();
		$('#matakuliah').change(function(){
			filter_dosen();
		});
	});

	function filter_dosen() {
		var kode_mk = $('#matakuliah').val();
		// console.log(kode_mk);
		if (kode_mk != '') 
		{
			$.ajax({
				url : "<?= base_url('kaprodi/kurikulum/filter_dosen') ?>",
				method : "POST",
				data:{kode_mk:kode_mk},
				success:function(data) 
				{
					$('#dosen').html(data);
				}
			})
		} 
		else 
		{
			$('#dosen').html('<option value="">Pilih Dosen</option>');
		}	
	}
</script>