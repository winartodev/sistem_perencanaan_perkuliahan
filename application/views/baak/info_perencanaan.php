			<!-- Main Content -->
			<div class="main-content">
				<section class="section">
					<div class="section-header">
						<?php foreach($perencanaan as $_perencanaan):?>
						<h1><?= $_perencanaan->nama_kelas, ' (',$_perencanaan->nama_mk,')' ?></h1>
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
										<h6>Jumlah Mahasiswa </h6>

										<div class="table-responsive">
											<table class="table table-striped">
												<thead>
													<tr>
														<th>Angkatan</th>
														<th>Jumlah Mahasiswa</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>15</td>
														<td><?= $A15; ?></td>

													</tr>
													<tr>
														<td>16</td>
														<td><?= $A16; ?></td>
													</tr>
													<tr>
														<td>17</td>
														<td><?= $A17; ?></td>
													</tr>
													<tr>
														<td>18</td>
														<td><?= $A18; ?></td>
													</tr>
													<tr>
														<th>Total Mahasiswa</th>
														<th><?= $A15 + $A16 + $A17 + $A18; ?></th>
													</tr>
												</tbody>
											</table>
										</div>

										<h6>Data Mahasiswa</h6>

										<div class="table-responsive">
											<table class="table table-striped">
												<thead>
													<tr>
														<th>NPM</th>
														<th>Nama</th>
														<th>Angkatan</th>
													</tr>
												</thead>
												<tbody>
													<?php foreach($mahasiswa as $mhs): ?>
													<tr>
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