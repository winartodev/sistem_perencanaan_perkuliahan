			<!-- Main Content -->
			<div class="main-content">
				<section class="section">
					<div class="section-body">						
						<!-- <?= $this->session->flashdata('pesan'); ?> -->
						<div class="row">
							<div class="col-12">
								<div class="card">
									<div class="card-body">
									<h4 class="text-center mb-4">Daftar Data Perencanaan</h4>

										<div class="table-responsive">
											<table class="table table-bordered">
												<thead>
													<tr>
														<th>No</th>
														<th>Nama Kelas</th>																										
														<th>Nama MK</th>																																																			
														<th>Nama Dosen</th>																																																			
														<th>Angkatan</th>																																																			
														<th>Jumlah Mahasiswa</th>																																																			
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
														<td><?= $_perencanaan->jumlah_mahasiswa?></td>
														
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

			<script>
			window.print()
			</script>
