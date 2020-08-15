			<!-- Main Content -->
			<div class="main-content">
				<section class="section">
					<div class="section-header">
						<h1>Keilmuan</h1>
						<!-- <div class="section-header-breadcrumb">
							<div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
							<div class="breadcrumb-item"><a href="#">Modules</a></div>
							<div class="breadcrumb-item">Mata Kuliah</div>
						</div> -->
					</div>

					<div class="section-body">						
                        <a class="btn btn-primary mb-4" href="<?= base_url('kaprodi/keilmuan/add') ?>"> <i class="fa fa-plus fa-sm" ></i> Tambah Keilmuan</a>
						<?= $this->session->flashdata('pesan'); ?>
						<div class="row">
							<div class="col-12">
								<div class="card">
									<div class="card-header">
										<h4>Daftar Data Keilmuan</h4>
									</div>
									<div class="card-body">
										<div class="table-responsive">
                                        <table class="table table-striped" id="table-1">
												<thead>
													<tr>
														<th>No</th>
														<th>Nama Dosen</th>																										
														<th>Bidang Ilmu</th>																																																			
														<th>Matakuliah</th>																																																			
														<th>Aksi</th>
													</tr>
												</thead>
												<tbody>   
                                                <?php
                                                    $no = 1; 
                                                    foreach($bidang_keilmuan as $_bidang_keilmuan): 
                                                ?>
													<tr>
														<td><?= $no++ ?></td>
														<td><?= $_bidang_keilmuan->nama_dosen ?></td>
														<td><?= $_bidang_keilmuan->bidang_ilmu ?></td>
														<td><?= $_bidang_keilmuan->nama_mk ?></td>
														<td>
															<?= anchor(base_url('kaprodi/keilmuan/edit/'. $_bidang_keilmuan->id_keilmuan), '<div class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit" href=""><i class="fas fa-pencil-alt"></i></div>')?>
															<?= anchor(base_url('kaprodi/keilmuan/delete/'. $_bidang_keilmuan->id_keilmuan), '<div class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete"><i class="fas fa-trash"></i></div>')?>
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
