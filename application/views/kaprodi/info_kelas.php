			<!-- Main Content -->
			<div class="main-content">
				<section class="section">
					<div class="section-header">
					<?php foreach($kelas as $kls): ?>
						<h1>Kelas <?= $kls->nama_kelas; ?> ( <?= $kls->nama_mk; ?> ) </h1>
					<?php endforeach; ?>
						<!-- <div class="section-header-breadcrumb">
							<div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
							<div class="breadcrumb-item"><a href="#">Modules</a></div>
							<div class="breadcrumb-item">Mata Kuliah</div>
						</div> -->
					</div>

					<div class="section-body">
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col-md-6">
                                        <?php foreach($kelas as $kls):?>
                                            <h6>Dosen : <?= $kls->nama_dosen; ?></h6>
                                        <?php endforeach; ?>
										<h6> Jumlah Angkatan 15 : <?= $A15; ?></h6>
										<h6> Jumlah Angkatan 16 : <?= $A16; ?></h6>
										<h6> Jumlah Angkatan 17 : <?= $A17; ?></h6>
										<h6> Jumlah Angkatan 18 : <?= $A18; ?></h6>
											<div class="table-responsive">
											<table class="table table-striped" id="table-1">
												<thead>
													<tr>
														<th>NPM</th>
														<th>Nama</th>
														<th>Angkatan</th>
													</tr>
												</thead>
												<tbody>
												<?php foreach($mahasiswa as $mhs): ?>
													<tr>
														<td><?= $mhs->npm; ?></td>
														<td><?= $mhs->nama_mhs; ?></td>
														<td><?= $mhs->angkatan; ?></td>	
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