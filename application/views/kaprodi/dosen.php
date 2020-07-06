			<!-- Main Content -->
			<div class="main-content">
				<section class="section">
					<div class="section-header">
						<h1>Dosen</h1>
						<!-- <div class="section-header-breadcrumb">
							<div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
							<div class="breadcrumb-item"><a href="#">Modules</a></div>
							<div class="breadcrumb-item">Mata Kuliah</div>
						</div> -->
					</div>

					<div class="section-body">						
                        <a class="btn btn-primary mb-4" href="<?= base_url('kaprodi/dosen/add') ?>"> <i class="fa fa-plus fa-sm" ></i> Tambah Dosen</a>
						<?= $this->session->flashdata('pesan'); ?>
						<div class="row">
							<div class="col-12">
								<div class="card">
									<div class="card-header">
										<h4>Daftar Data Dosen</h4>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-striped" id="table-1">
												<thead>
													<tr>
														<th>Kode Dosen</th>
														<th>Nama</th>																										
														<th>Email</th>																																																			
														<th>No Telp</th>																																																			
														<th>Aksi</th>
													</tr>
												</thead>
												<?php foreach($dosen as $dsn): ?>
													<tr>
														<td><?= $dsn->kode_dosen; ?></td>
														<td><?= $dsn->nama_dosen; ?></td>
														<td><?= $dsn->email; ?></td>
														<td><?= $dsn->no_telp; ?></td>
														<td>
															<?= anchor(base_url('kaprodi/dosen/info/'. $dsn->kode_dosen), '<div class="btn btn-info btn-action mr-1" data-toggle="tooltip" title="Info" href=""><i class="fas fa-search-plus"></i></div>')?>
															<?= anchor(base_url('kaprodi/dosen/edit/'. $dsn->kode_dosen), '<div class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit" href=""><i class="fas fa-pencil-alt"></i></div>')?>
															<?= anchor(base_url('kaprodi/dosen/delete/'. $dsn->kode_dosen), '<div class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete"><i class="fas fa-trash"></i></div>')?>
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
