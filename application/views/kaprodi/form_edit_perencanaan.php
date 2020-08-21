			<!-- Main Content -->
			<div class="main-content">
				<section class="section">
					<div class="section-header">
						<h1>Perencanaan</h1>
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
                                        <?php foreach($perencanaan as $_perencanaan):?>
                                            <form method="POST" action="<?= base_url('Kaprodi/perencanaan/update_perencanaan')?>" enctype="multipart/form-data">
                                                <div class="card-header">
                                                    <h4>Form Matakuliah</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label>Nama Kelompok</label>
                                                        <input type="text" name="id" class="form-control" value="<?= $_perencanaan->id_perencanaan?>" hidden>
                                                        <select class="form-control" name="kode_kelompok">
                                                            <option value="<?= $_perencanaan->kode_kelompok?>"><?= $_perencanaan->nama_kelompok?></option>
                                                            <?php foreach($kelompok as $_kelompok): ?>
                                                                <option value="<?= $_kelompok->kode_kelompok ?>"><?= $_kelompok->nama_kelompok; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                        <?= form_error('kode_kelompok', '<div class="text-small text-danger">', '</div>'); ?>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Angkatan</label>
                                                        <select class="form-control" name="angkatan" id="angkatan">
                                                            <option value="<?= $_perencanaan->angkatan_perencanaan?>"><?= $_perencanaan->angkatan_perencanaan?></option>
                                                            <option value="15">15</option>
                                                            <option value="16">16</option>
                                                            <option value="17">17</option>
                                                            <option value="18">18</option>
                                                        </select>
                                                        <?= form_error('angkatan', '<div class="text-small text-danger">', '</div>'); ?>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Semester</label>
                                                        <select class="form-control" name="semester" id="semester">
                                                            <option value="<?= $_perencanaan->semester_perencanaan?>"><?= $_perencanaan->semester_perencanaan?></option>       
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
                                                        <select class="form-control" name="kode_mk" id="matakuliah" >
                                                
                                                        </select>
                                                        <?= form_error('kode_mk', '<div class="text-small text-danger">', '</div>'); ?>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Dosen</label>
                                                        <select class="form-control" name="kode_dosen" id="dosen">
                                                           
                                                        </select>
                                                        <?= form_error('kode_dosen', '<div class="text-small text-danger">', '</div>'); ?>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Kelas</label>
                                                        <select class="form-control" name="kode_kelas" id="kelas">
                                                           
                                                        </select>
                                                        <?= form_error('kode_kelas', '<div class="text-small text-danger">', '</div>'); ?>
                                                    </div>
													<div class="form-group">
                                                        <label>Jumlah Mahasiswa</label>
                                                        <select class="form-control" name="jumlah_mahasiswa" id="kelas">
															<option value="<?= $_perencanaan->jumlah_mahasiswa?>"><?= $_perencanaan->jumlah_mahasiswa?></option>
                                                           <option value="10">10</option>
                                                           <option value="20">20</option>
                                                           <option value="30">30</option>
                                                           <option value="35">35</option>
                                                           <option value="40">40</option>
                                                        </select>
                                                        <?= form_error('jumlah_mahasiswa', '<div class="text-small text-danger">', '</div>'); ?>
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

            <script>
	$(document).ready(function() {
		get_matakuliah();
		get_dosen();
		get_kelas();

		$('#semester').change(function() {
			get_matakuliah();
		})

		$('#matakuliah').change(function() {
			get_dosen();
		})

		$('#angkatan').change(function() {
			get_kelas();
		})

	});

	function get_matakuliah() 
	{
		var semester = $('#semester').val();
		var angkatan = $('#angkatan').val();
		// console.log(semester);
		if (semester != '') 
		{
			$.ajax({
				url : "<?= base_url('kaprodi/perencanaan/filter_matakuliah') ?>",
				method : "POST",
				data:{semester:semester, angkatan:angkatan},
				success:function(data) 
				{
					$('#matakuliah').html(data);
					// console.log(data)
				}
			})
		} else 
		{
			$('#matakuliah').html('<option value="">Pilih Matakuliah</option>');			
			$('#dosen').html('<option value="">Pilih Dosen</option>');			
			$('#kelas').html('<option value="">Pilih Kelas</option>');			
		}
	}

	function get_dosen() 
	{
		var kode_mk = $('#matakuliah').val();

		if (kode_mk != '') 
		{
			$.ajax({
				url : "<?= base_url('kaprodi/perencanaan/filter_dosen') ?>",
				method : "POST",
				data:{kode_mk:kode_mk},
				success:function(data) 
				{
					$('#dosen').html(data);
					// console.log('SUCCESS')
				}
			})
		} else 
		{
			$('#matakuliah').html('<option value="">Pilih Matakuliah</option>');			
			$('#dosen').html('<option value="">Pilih Dosen</option>');			
			$('#kelas').html('<option value="">Pilih Kelas</option>');			
		}
	}

	function get_kelas() 
	{
		var angkatan = $('#angkatan').val();

		if (angkatan != '') 
		{
			$.ajax({
				url : "<?= base_url('kaprodi/perencanaan/filter_kelas') ?>",
				method : "POST",
				data:{angkatan:angkatan},
				success:function(data) 
				{
					$('#kelas').html(data);
					// console.log('SUCCESS')
				}
			})
		} else 
		{
			$('#matakuliah').html('<option value="">Pilih Matakuliah</option>');			
			$('#dosen').html('<option value="">Pilih Dosen</option>');			
			$('#kelas').html('<option value="">Pilih Kelas</option>');			
		}
	}
</script>