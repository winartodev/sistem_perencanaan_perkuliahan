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
						<?= $this->session->flashdata('pesan'); ?>
						<div class="row">
							<div class="col-12">
								<div class="card">
									<div class="card-header">
										<h4>Daftar Data Keilmuan</h4>
									</div>
									<div class="card-body">
										<div class="form-group">
											<label>Bidang Keilmuan</label>
											<select name="" class="form-control" id="keilmuan">
												<option value="">Pilih Bidang Keilmuan</option>
												<?php foreach($matakuliah as $_matakuliah):?>
													<option value="<?= $_matakuliah->kode_mk ?>"><?= $_matakuliah->nama_mk ?></option>
												<?php endforeach;?>
											</select>
										</div>
										<div class="table-responsive">
											<table class="table table-striped" id="tbl_bidang_keilmuan">
												<thead>
													<tr>
														<th>No</th>
														<th>Nama Dosen</th>
														<th>Bidang Ilmu</th>
														<th>Matakuliah</th>
													</tr>
												</thead>
												<tbody>
													
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>

<script>
	$(document).ready(function() {
		filter_keilmuan();
		$('#keilmuan').change(function(){
			filter_keilmuan();
		});
	});

	function filter_keilmuan() {
		var kode_mk = $('#keilmuan').val();
		// console.log(kode_mk);
		$.ajax({
			url		: "<?= base_url('baak/Keilmuan/filter_keilmuan') ?>",
			data	: 'keilmuan=' + kode_mk,
			success:function(data) 
			{
				// console.log(data)
				$("#tbl_bidang_keilmuan tbody").html(data)
			}
		});
	}

</script>
