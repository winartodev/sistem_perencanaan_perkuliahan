			<!-- Main Content -->
			<div class="main-content">
				<section class="section">
					<div class="section-header">
						<h1>Pendaftaran Kelas</h1>
						<!-- <div class="section-header-breadcrumb">
							<div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
							<div class="breadcrumb-item"><a href="#">Modules</a></div>
							<div class="breadcrumb-item">Mata Kuliah</div>
						</div> -->
					</div>

					<div class="section-body">						
                        <!-- <a class="btn btn-primary mb-4" href="<?= base_url('Mahasiswa/Kelas/Daftar') ?>"> <i class="fa fa-plus fa-sm" ></i> Tambah Mata Kuliah</a> -->
						<?= $this->session->flashdata('pesan'); ?>
						<div class="row">
							<div class="col-12">
								<div class="card">
									<div class="card-header">
										<h4>Daftar Kelas</h4>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-striped" id="table-1">
												<thead>
													<tr>
														<th>Kelas</th>
														<th>Kode MK</th>
                                                        <th>Nama Mk</th>
														<th>Sks</th>																																																																																																																																																																																																																							
														<th>Aksi</th>
													</tr>
												</thead>
												<tbody> 
												<?php foreach($kelas as $kls): ?>
													<tr>
														<td><?= $kls->nama_kelas; ?></td>
														<td><?= $kls->kode_mk; ?></td>
														<td><?= $kls->nama_mk; ?></td>
														<td><?= $kls->sks; ?></td>
														<td>
															<?= anchor(base_url('Mahasiswa/Kelas/Daftar/'. $kls->id), '<div class="btn btn-warning btn-action mr-1 text-bold" href="">Daftar</div>')?>
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
