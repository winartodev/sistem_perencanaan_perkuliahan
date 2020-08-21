			<!-- Main Content -->
			<div class="main-content">
				<section class="section">
					<div class="section-header">
						<?php foreach($matakuliah as $_matakuliah):?>
						<h1><?= $_matakuliah->nama_kelas, ' (',$_matakuliah->nama_mk,')' ?></h1>
						<?php endforeach; ?>
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
										<h6>Data Mahasiswa</h6>
										<div class="table-responsive">
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