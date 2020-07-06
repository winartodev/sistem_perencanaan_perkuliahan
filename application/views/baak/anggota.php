			<!-- Main Content -->
			<div class="main-content">
				<section class="section">
					<div class="section-header">
						<h1>Anggota BAAK</h1>
						<!-- <div class="section-header-breadcrumb">
							<div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
							<div class="breadcrumb-item"><a href="#">Modules</a></div>
							<div class="breadcrumb-item">Mata Kuliah</div>
						</div> -->
					</div>

					<div class="section-body">						
                        <a class="btn btn-primary mb-4" href="<?= base_url('baak/anggota/add') ?>"> <i class="fa fa-plus fa-sm" ></i> Tambah Anggota</a>
						<?= $this->session->flashdata('pesan'); ?>
						<div class="row">
							<div class="col-12">
								<div class="card">
									<div class="card-header">
										<h4>Daftar Data Anggota BAAK</h4>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-striped" id="table-1">
												<thead>
													<tr>
														<th>ID</th>
														<th>Nama</th>																										
														<th>Email</th>																																																																																																					
														<th>Aksi</th>
													</tr>
												</thead>
                                                <?php foreach($baak as $_baak): ?>
                                                    <tr>
														<td><?= $_baak->id; ?></td>
														<td><?= $_baak->nama; ?></td>																										
														<td><?= $_baak->email; ?></td>																																																																																																					
														<td>
                                                            <!-- <?= anchor(base_url('baak/anggota/info/'. $_baak->id), '<div class="btn btn-info btn-action mr-1" data-toggle="tooltip" title="Info" href=""><i class="fas fa-search-plus"></i></div>')?> -->
															<?= anchor(base_url('baak/anggota/edit/'. $_baak->id), '<div class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit" href=""><i class="fas fa-pencil-alt"></i></div>')?>
															<?= anchor(base_url('baak/anggota/delete/'. $_baak->id), '<div class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete"><i class="fas fa-trash"></i></div>')?>
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
