			<!-- Main Content -->
			<div class="main-content">
				<section class="section">
					<div class="section-header">
						<h1>Mahasiswa</h1>
						<!-- <div class="section-header-breadcrumb">
							<div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
							<div class="breadcrumb-item"><a href="#">Modules</a></div>
							<div class="breadcrumb-item">Mata Kuliah</div>
						</div> -->
					</div>

					<div class="section-body">						
                        <!-- <a class="btn btn-primary mb-4" href="<?= base_url('BAAK/Mahasiswa/Add') ?>"> <i class="fa fa-plus fa-sm" ></i> Tambah Mahasiswa</a> -->
						<?= $this->session->flashdata('pesan'); ?>
						<div class="row">
							<div class="col-12">
								<div class="card">
									<div class="card-header">
										<h4>Daftar Data Mahasiswa</h4>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-striped" id="table-1">
												<thead>
													<tr>
														<th>NPM</th>
														<th>Nama</th>																										
														<th>Email</th>																																																			
														<th>angkatan</th>																																																			
														<th>Aksi</th>
													</tr>
												</thead>
                                                <?php foreach($mahasiswa as $mhs): ?>
                                                    <tr>
														<td><?= $mhs->npm; ?></td>
														<td><?= $mhs->nama_mhs; ?></td>																										
														<td><?= $mhs->email; ?></td>																																																			
														<td><?= $mhs->angkatan; ?></td>																																																			
														<td>
                                                            <?= anchor(base_url('Kaprodi/Mahasiswa/Info/'. $mhs->npm), '<div class="btn btn-info btn-action mr-1" data-toggle="tooltip" title="Info" href=""><i class="fas fa-search-plus"></i></div>')?>
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
