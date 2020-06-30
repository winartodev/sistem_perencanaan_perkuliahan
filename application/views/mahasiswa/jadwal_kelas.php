			<!-- Main Content -->
			<div class="main-content">
				<section class="section">
					<div class="section-header">
						<h1>Jadwal</h1>
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
										<h4>Matakuliah Yang Di Ampuh</h4>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-striped" id="table-1">	
												<thead>
													<tr>
														<th>Kelas</th>
														<th>Kode MK</th>
														<th>Nama MK</th>
                                                        <th>Semester</th>
														<th>Status</th>																																																																																																																																																																																																																							
														<th>Aksi</th>
													</tr>
												</thead>
												<tbody> 
												<?php foreach($jadwal as $jdwl): ?>
													<tr>
														<td><?= $jdwl->nama_kelas; ?></td>
														<td><?= $jdwl->kode_mk; ?></td>
														<td><?= $jdwl->nama_mk; ?></td>
														<td><?= $jdwl->semester; ?></td>
														<td><?= $jdwl->status; ?></td>
														<td>
															<?= anchor(base_url('Mahasiswa/Matakuliah/Batal/'. $jdwl->id), '<div class="btn btn-danger btn-action mr-1 text-bold" href="">Batal</div>')?>
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
