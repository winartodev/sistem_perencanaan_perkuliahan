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
						<?= $this->session->flashdata('pesan'); ?>
						<div class="row">
							<div class="col-12">
								<div class="card">
									<div class="card-header">
										<h4>Daftar Perencanaan Mu</h4>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-striped" id="table-1">	
												<thead>
													<tr>
														<th>Kode MK</th>
														<th>Nama MK</th>
                                                        <th>Nama Dosen</th>
                                                        <th>SKS Teori</th>
                                                        <th>SKS Praktek</th>
                                                        <th>Total SKS</th>
														<th>Kelas</th>																																																																																																																																																																																																																							
													</tr>
												</thead>
												<tbody> 
												<?php foreach($jadwal as $jdwl): ?>
													<tr>
														<td><?= $jdwl->kode_mk; ?></td>
														<td><?= $jdwl->nama_mk; ?></td>
														<td><?= $jdwl->nama_dosen; ?></td>
														<td><?= $jdwl->sks_teori; ?></td>
														<td><?= $jdwl->sks_praktek; ?></td>
														<td><?= $jdwl->total_sks; ?></td>
														<td><?= $jdwl->nama_kelas; ?></td>
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
