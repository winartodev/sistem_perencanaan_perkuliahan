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
                        <a class="btn btn-primary mb-4" href="<?= base_url('kaprodi/perencanaan/add') ?>"> <i class="fa fa-plus fa-sm" ></i> Tambah Perencanaan </a>
						<?= $this->session->flashdata('pesan'); ?>
						<div class="row">
							<div class="col-12">
								<div class="card">
									<div class="card-header">
										<h4>Daftar Data Perencanaan</h4><br>
									</div>
									<div class="card-body">
										<a class="btn btn-warning mb-4" href="<?= base_url('kaprodi/perencanaan/print') ?>"> <i class="fa fa-print fa-lg mr-2" ></i> Print</a>
										<div class="table-responsive">
											<table class="table table-striped" id="table-1">
												<thead>
													<tr>
														<th>No</th>
														<th>Nama Kelas</th>																										
														<th>Nama MK</th>																																																			
														<th>Angkatan</th>
														<th>Jumlah Mahasiswa</th>	
														<th>Nama Dosen</th>																																																			
														<th>Status</th>																																																			
														<th>Aksi</th>
													</tr>
												</thead>
                                                <?php
                                                    $no = 1; 
                                                    foreach($perencanaan as $_perencanaan): 
                                                ?>
													<tr>
														<td><?= $no++ ?></td>
														<td><?= $_perencanaan->nama_kelas ?></td>
														<td><?= $_perencanaan->nama_mk ?></td>
														<td><?= $_perencanaan->angkatan_perencanaan ?></td>
														<td><?= $this->model_jadwal->jumlah_mahasiswa($_perencanaan->id_perencanaan), ' / ', $_perencanaan->jumlah_mahasiswa?></td>
														<td><?= $_perencanaan->nama_dosen ?></td>									
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
														<?php 
																if ($_perencanaan->status_perencanaan == 'sudah_verifikasi'):
															?>
																<!-- <div class="btn btn-success btn-action mr-1 disabled" data-toggle="tooltip" title="Verifikasi" href=""><i class="fas fa-check"></i></div>		 -->
																<?= anchor(base_url('kaprodi/perencanaan/info/'. $_perencanaan->id_perencanaan), '<div class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Info" href=""><i class="fas fa-search-plus"></i></div>')?>
																<?= anchor(base_url('kaprodi/perencanaan/delete/'. $_perencanaan->id_perencanaan), '<div class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete"><i class="fas fa-trash"></i></div>')?>
															<?php
																else:?>
																	<?= anchor(base_url('kaprodi/perencanaan/verifikasi/'. $_perencanaan->id_perencanaan), '<div class="btn btn-success btn-action mr-1 btn-block" data-toggle="tooltip" title="Verifikasi" href=""><i class="fas fa-check"></i></div>')?>																
															<?php	 
																endif
															?>
															<!-- <?= anchor(base_url('kaprodi/perencanaan/edit/'. $_perencanaan->id_perencanaan), '<div class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit" href="" colspan="3"><i class="fas fa-pencil-alt"></i></div>')?> -->
														</td>
													</tr>
												<?php endforeach; ?>
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
