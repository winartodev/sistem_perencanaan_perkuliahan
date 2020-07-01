			<!-- Main Content -->
			<div class="main-content">
				<section class="section">
					<div class="section-header">
						<h1>Pengumuman</h1>
					</div>

					<div class="section-body">						
                        <a class="btn btn-primary mb-4" href="<?= base_url('BAAK/Pengumuman/Add') ?>"> <i class="fa fa-plus fa-sm" ></i> Buat Pengumuman</a>
						<?= $this->session->flashdata('pesan'); ?>
						<div class="row">
							<div class="col-12">
								<div class="card">
									<div class="card-header">
										<h4>Daftar Pengumuman</h4>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-striped" id="table-1">
												<thead>
													<tr>
														<th>No</th>
														<th>Judul</th>																										
														<th>Tanggal</th>																																																			
														<th>Konten</th>																																																			
														<th>Aksi</th>
													</tr>
												</thead>
												<?php 
													$no = 1;
													foreach($pengumuman as $_pengumuman): 
												?>
                                                    <tr>
														<td><?= $no++; ?></td>
														<td><?= $_pengumuman->judul; ?></td>																										
														<td><?= $_pengumuman->tanggal; ?></td>																																																			
														<td><?= $_pengumuman->konten; ?></td>																																																			
														<td>
															<?= anchor(base_url('BAAK/Pengumuman/Edit/'. $_pengumuman->id), '<div class="btn btn-primary btn-action mr-1" data-toggle="tooltip" title="Edit" href=""><i class="fas fa-pencil-alt"></i></div>')?>
															<?= anchor(base_url('BAAK/Pengumuman/Delete/'. $_pengumuman->id), '<div class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete"><i class="fas fa-trash"></i></div>')?>
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
