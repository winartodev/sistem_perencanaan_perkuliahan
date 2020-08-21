			<!-- Main Content -->
			<div class="main-content">
				<section class="section">
					<div class="section-header">
						<h1>Pra Perencanaan Perkuliahan</h1>
						<!-- <div class="section-header-breadcrumb">
							<div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
							<div class="breadcrumb-item"><a href="#">Modules</a></div>
							<div class="breadcrumb-item">Mata Kuliah</div>
						</div> -->
					</div>

					<div class="section-body">						
                        <a class="btn btn-info mb-4" href="<?= base_url('mahasiswa/pra_perencanaan/detail_rencana') ?>"> <i class="fa fa-eye fa-sm mr-2" ></i>Detail Rencana Mu</a>
						<?= $this->session->flashdata('pesan'); ?>
						<div class="row">
							<div class="col-12">
								<div class="card">
									<div class="card-header">
										<h4>Daftar Pra Perencanaan</h4>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-striped" id="table-1">
												<thead>
													<tr>
														<th>ID Perencanaan</th>
														<th>Kelas</th>
														<th>Kode MK</th>
                                                        <th>Nama Mk</th>
														<th>SKS Teori</th>																																																																																																																																																																																																																							
														<th>SKS Praktek</th>																																																																																																																																																																																																																							
														<th>Total SKS</th>	
														<th>Jumlah Mahasiswa</th>	
														<th>Aksi</th>
													</tr>
												</thead>
												<tbody> 
												<?php 
													foreach($penginputan as $tanggal):
														if(date('Y-m-d') != $tanggal->tanggal_akhir):
															foreach($kelas as $kls): 
																if ($kls->status_perencanaan == 'sudah_verifikasi'):
													?>
													<tr>
														<td><?= $kls->id_perencanaan; ?></td>
														<td><?= $kls->nama_kelas; ?></td>
														<td><?= $kls->kode_mk; ?></td>
														<td><?= $kls->nama_mk; ?></td>
														<td><?= $kls->sks_teori; ?></td>
														<td><?= $kls->sks_praktek; ?></td>
														<td><?= $kls->total_sks; ?></td>
														<td> <?= $this->model_perencanaan->jumlah_mahasiswa($kls->id_perencanaan) ?> / 10</td>
														<td>
															<?= anchor(base_url('mahasiswa/pra_perencanaan/daftar/'. $kls->id_perencanaan), '<div class="btn btn-warning btn-action mr-1 text-bold" href="">Daftar</div>')?>
														</td>
													</tr>               
												<?php 
																endif;
															endforeach; 
														else: ?>
															<tr>
																<td colspan="8" align="center" class="text-danger">
																	BATAS PERENCANAAN SUDAH BERAKHIR
																</td>
															</tr>
														<?php 
															endif;
													endforeach; 
												?>
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
