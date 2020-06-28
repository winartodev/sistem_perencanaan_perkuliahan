			<!-- Main Content -->
			<div class="main-content">
				<section class="section">
					<div class="section-header">
						<h1>Dosen</h1>
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
										<?php foreach($mahasiswa as $mhs): ?>
										<h5><?= $mhs->nama_mhs; ?> | <?= $mhs->npm; ?></h5>
										<table>
											<tr>
												<td>Email </td>
												<td>: <?= $mhs->email ?></td>
											</tr>
											<tr>
												<td>No Telp </td>
												<td>: <?= $mhs->no_telp ?></td>
											</tr>
                                            <tr>
												<td>Semester </td>
												<td>: <?= $mhs->semester ?></td>
											</tr>
										</table>
										<?php endforeach; ?>

										<hr class="mb-4">
										<h5>Mata Kuliah Yang Di Ampuh</h5>

										<div class="table-responsive">
											<table class="table table-striped" id="table-1">
												<thead>
													<tr>
														<th>Kelas</th>
														<th>Mata Kuliah</th>
														<th>SKS</th>
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
