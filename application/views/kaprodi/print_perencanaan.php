			<!-- Main Content -->
			<div class="main-content">
				<section class="section">
					<div class="section-body">						
						<div class="row">
							<div class="col-12">
								<div class="card">
									<div class="card-body">
										<h3 class="text-center mb-4">Perencanaan Perkuliahan</h3>
										<div class="table-responsive">
											<table class="table table-bordered">
												<thead>
													<tr>
														<th>No</th>
														<th>Nama Kelas</th>																										
														<th>Nama MK</th>																																																			
														<th>Angkatan</th>
														<th>Jumlah Mahasiswa</th>	
														<th>Nama Dosen</th>																																																			
														<!-- <th>Status</th>																																																		 -->
														<!-- <th>Aksi</th> -->
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
														<td><?= $_perencanaan->jumlah_mahasiswa?></td>
														<td><?= $_perencanaan->nama_dosen ?></td>									
														<!-- <td>
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
														</td> -->
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
			<script>
				window.print()
			</script>