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
						<a class="btn btn-primary mb-4" href="<?= base_url('kaprodi/kurikulum/add') ?>"> <i
								class="fa fa-plus fa-sm"></i> Tambah Kurikulum </a>
						<?= $this->session->flashdata('pesan'); ?>
						<div class="row">
							<div class="col-12">
								<div class="card">
									<div class="card-header">
										<h4>Daftar Data Kurikulum</h4>
									</div>
									<div class="card-body">
										<div class="row">
											<div class="col">
												<label>Angkatan</label>
												<select class="form-control" id="angkatan">
													<option value="">Pilih Angkatan</option>
													<option value="15">15</option>
													<option value="16">16</option>
													<option value="17">17</option>
													<option value="18">18</option>
												</select>
											</div>
											<div class="col">
												<label>Semester</label>
												<select class="form-control" id="semester">
													<option value="">Pilih Semester</option>
													<option value="1">1</option>
													<option value="2">2</option>
													<option value="3">3</option>
													<option value="4">4</option>
													<option value="5">5</option>
													<option value="6">6</option>
													<option value="7">7</option>
													<option value="8">8</option>
												</select>
											</div>
										</div>
										<div class="table-responsive mt-3">
											<table class="table table-striped" id="table-1">
												<thead>
													<tr>
														<th>No</th>
														<th>Tahun Akademik</th>
														<th>Angkatan</th>
														<th>Semester</th>
														<th>Nama Dosen</th>
														<th>Nama MK</th>
														<th>Aksi</th>
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
		filter_angkatan_and_semester();

		$('#angkatan').change(function(){
			filter_angkatan_and_semester();
		});
		$('#semester').change(function(){
			filter_angkatan_and_semester();
		});

		$('#semester').change(function(){
			$('#angkatan').change(function(){
				filter_angkatan_and_semester();
			});
		});

		$('#angkatan').change(function(){
			$('#semester').change(function(){
				filter_angkatan_and_semester();
			});
		});
	});

	function filter_angkatan() {
		var angkatan = $('#angkatan').val();
		console.log(angkatan);
		$.ajax({
			url		: "<?= base_url('kaprodi/kurikulum/filter_angkatan') ?>",
			data	: 'angkatan=' + angkatan,
			success : function(data) 
			{
				// console.log(data)
				$("#table-1 tbody").html(data)
			}
		});
	}

	function filter_semester() 
	{
		var semester = $('#semester').val();
		console.log('2')
		$.ajax({
			url		: "<?= base_url('kaprodi/kurikulum/filter_semester') ?>",
			data	: 'semester=' + semester,
			success : function(data) 
			{
				// console.log(data)
				$("#table-1 tbody").html(data)
			}
		});
	}

	function filter_angkatan_and_semester() 
	{
		var semester = $('#semester').val();
		var angkatan = $('#angkatan').val();
		$.ajax({
			url		: "<?= base_url('kaprodi/kurikulum/filter_angkatan_with_semester') ?>",
			data	: {'semester':semester,  'angkatan': angkatan},
			success : function(data) 
			{
				// console.log(data)
				$("#table-1 tbody").html(data)
			}
		});
	}

</script>