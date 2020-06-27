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
                        <a class="btn btn-primary mb-4" href="<?= base_url('Kaprodi/Kelas/Add') ?>"> <i class="fa fa-plus fa-sm" ></i> Tambah Kelas </a>
						<?= $this->session->flashdata('pesan'); ?>
						<div class="row">
							<div class="col-12">
								<div class="card">
									<div class="card-header">
										<h4>Daftar Data Kelas</h4>
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
														<th>Aksi</th>
													</tr>
												</thead>
                                                <?php
                                                    $no = 1; 
                                                    foreach($kelas as $kls): 
                                                ?>
													<tr>
														<td><?= $no++ ?></td>
														<td><?= $kls->nama_kelas ?></td>
														<td><?= $kls->nama_mk ?></td>
														<td><?= $kls->nama_dosen ?></td>
														<td>
                                                            <?= anchor(base_url('Kaprodi/kelas/Info/'. $kls->no), '<div class="btn btn-info btn-action mr-1" data-toggle="tooltip" title="Info" href=""><i class="fas fa-search-plus"></i></div>')?>
															<?= anchor(base_url('Kaprodi/kelas/Edit/'. $kls->no), '<div class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit" href=""><i class="fas fa-pencil-alt"></i></div>')?>
															<?= anchor(base_url('Kaprodi/kelas/Delete/'. $kls->no), '<div class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete"><i class="fas fa-trash"></i></div>')?>
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
