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
                        <!-- <a class="btn btn-primary mb-4" href="<?= base_url('kaprodi/perencanaan/add') ?>"> <i class="fa fa-plus fa-sm" ></i> Tambah Perencanaan </a> -->
						<?= $this->session->flashdata('pesan'); ?>
						<div class="row">
							<div class="col-12">
								<div class="card">
									<div class="card-header">
										<h4>Daftar Data Perencanaan</h4>
										
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-striped" id="table-1">
												<thead>
													<tr>
														<th>No</th>
														<th>Nama Kelas</th>																										
														<th>Nama MK</th>																																																			
														<th>Nama Dosen</th>																																																			
														<th>Angkatan</th>																																																			
														<th>Jumlah Mahasiswa</th>																																																			
														<th>Status</th>																																																			
														<th>Aksi</th>
													</tr>
												</thead>
                                                <?php
                                                    $no = 1; 
													foreach($perencanaan as $_perencanaan): 
															if ($_perencanaan->status_perencanaan == 'sudah_verifikasi'):
                                                ?>
													<tr>
														<td><?= $no++ ?></td>
														<td><?= $_perencanaan->nama_kelas ?></td>
														<td><?= $_perencanaan->nama_mk ?></td>
														<td><?= $_perencanaan->nama_dosen ?></td>
														<td><?= $_perencanaan->angkatan_perencanaan ?></td>
														<td><?= $this->model_jadwal->jumlah_mahasiswa($_perencanaan->id_perencanaan) ?> / <?= $_perencanaan->jumlah_mahasiswa?></td>
														<td>
															<?php 
																if ($_perencanaan->status_perencanaan == 'sudah_verifikasi'):
															?>
																	<span class="badge badge-primary">Sudah Verifikasi</span>																
															<?php
																else:?>
																	<span class="badge badge-danger ">Belum Verifikasi</span>																
															<?php	 
																endif
															?>
														</td>
														<td>
															<?= anchor(base_url('baak/perencanaan/info/'. $_perencanaan->id_perencanaan), '<div class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Info" href=""><i class="fas fa-search-plus"></i></div>')?>
														</td>
													</tr>
												<?php
															endif;
													endforeach; 
												?>
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
