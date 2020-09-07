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
										<?php foreach($kurikulum as $kurikulum): ?>
										<table class="table">
											<tr>
												<td>Tahun Akademik </td>
												<td>: <?= $kurikulum->tahun_akademik ?></td>
											</tr>
											<tr>
												<td>Angkatan </td>
												<td>: <?= $kurikulum->angkatan ?></td>
											</tr>
											<tr>
												<td>Semester </td>
												<td>: <?= $kurikulum->semester_kurikulum ?></td>
											</tr>
											<tr>
												<td>Kode Matakuliah </td>
												<td>: <?= $kurikulum->kode_mk ?></td>
											</tr>
											<tr>
												<td>Nama Matakuliah </td>
												<td>: <?= $kurikulum->nama_mk ?></td>
											</tr>
											<tr>
												<td>SKS Teori </td>
												<td>: <?= $kurikulum->sks_teori ?></td>
											</tr>
											<tr>
												<td>SKS Praktek </td>
												<td>: <?= $kurikulum->sks_praktek ?></td>
											</tr>
										</table>
									</div>
									<!-- <div class="col-md-6">
										<table class="table">
											<tr>
												<td>Kode Dosen </td>
												<td>: <?= $kurikulum->kode_dosen ?></td>
											</tr>
											<tr>
												<td>Dosen </td>
												<td>: <?= $kurikulum->nama_dosen ?></td>
											</tr>
										</table>
										<?php endforeach; ?>
									</div> -->
								</div>
							</div>
						</div>
					</div>
				</section>
			</div>
