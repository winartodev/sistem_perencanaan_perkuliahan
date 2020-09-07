			<!-- Main Content -->
			<div class="main-content">
				<section class="section">
					<div class="section-body">						
						<div class="row">
							<div class="col-12">
								<div class="card">
									<div class="card-body">
									<h4 class="text-center mb-5">Data Perencanaan</h4>
										<div class="table-responsive">
											<table class="table table-bordered">	
												<thead>
													<tr>
														<th>Kode MK</th>
														<th>Nama MK</th>
                                                        <th>Nama Dosen</th>
                                                        <th>SKS Teori</th>
                                                        <th>SKS Praktek</th>
                                                        <th>Total SKS</th>
														<th>Kelas</th>																																																																																																																																																																																																																							
													</tr>
												</thead>
												<tbody> 
												<?php foreach($jadwal as $jdwl): ?>
													<tr>
														<td><?= $jdwl->kode_mk; ?></td>
														<td><?= $jdwl->nama_mk; ?></td>
														<td><?= $jdwl->nama_dosen; ?></td>
														<td><?= $jdwl->sks_teori; ?></td>
														<td><?= $jdwl->sks_praktek; ?></td>
														<td><?= $jdwl->total_sks; ?></td>
														<td><?= $jdwl->nama_kelas; ?></td>
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

			<script>
				window.print()
			</script>

