			<!-- Main Content -->
			<div class="main-content">
				<section class="section">
					<div class="section-header">
						<h1>Kelas</h1>
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
										<h4>Daftar Mahasiswa</h4>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-striped" id="table-1">	
												<thead>
													<tr>
														<th>Kelas</th>
														<th>NPM</th>
														<th>angkatan</th>
                                                        <th>Kode Kelas</th>
														<th>Aksi</th>
													</tr>
												</thead>
												<tbody> 
												<?php foreach($perencanaan as $jdwl): ?>
													<tr>
														<td><?= $jdwl->nama_kelas; ?></td>
														<td><?= $jdwl->npm; ?></td>
														<td><?= $jdwl->angkatan; ?></td>
														<td><?= $jdwl->kode_kelas; ?></td>
														<td>
															<?= anchor(base_url('BAAK/Kelas/Verifikasi/'. $jdwl->kode_kelas), '<div class="btn btn-info btn-action mr-1 text-bold" href="">Verifikasi</div>')?>
														</td>
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
