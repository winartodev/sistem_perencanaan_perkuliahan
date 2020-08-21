			<!-- Main Content -->
			<div class="main-content">
				<section class="section">
					<div class="section-header">
						<h1>Matakuliah</h1>
						<!-- <div class="section-header-breadcrumb">
							<div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
							<div class="breadcrumb-item"><a href="#">Modules</a></div>
							<div class="breadcrumb-item">Mata Kuliah</div>
						</div> -->
					</div>

					<div class="section-body">
						<div class="card">
							<div class="card-body">
							<div class="col-md-6">
								<table class="table table-striped">
									<?php foreach($matakuliah as $_matakuliah):?>
									<tr>
										<th>Kode MK</th>
										<th><?= $_matakuliah->kode_mk; ?></th>
									</tr>
									<tr>
										<th>Nama Matakuliah</th>
										<th><?= $_matakuliah->nama_mk; ?></th>
									</tr>
									<tr>
										<th>Jumlah Mahasiswa </th>
										<th><?= $this->model_matakuliah->jumlah_mahasiswa($_matakuliah->kode_mk); ?></th>
									</tr>
									<?php endforeach; ?>
								</table>
							</div>
								
								<div class="row">
									<div class="col-md-6">
									<h4 align="center">Data Mahasiswa</h4>
										<div class="table-responsive mt-4">
											<table class="table table-striped" id='table-1'>
												<thead>
													<tr>
														<th>Kelas</th>
														<th>NPM</th>
														<th>Nama</th>
														<th>Angkatan</th>
													</tr>
												</thead>
												<tbody>
													<?php foreach($mahasiswa as $mhs): ?>
													<tr>
														<td><?= $mhs->nama_kelas; ?></td>
														<td><?= $mhs->npm; ?></td>
														<td><?= $mhs->nama_mhs; ?></td>
														<td><?= $mhs->angkatan; ?></td>
													</tr>
													<?php endforeach; ?>
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