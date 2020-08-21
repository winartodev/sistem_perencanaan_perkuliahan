      <!-- Main Content -->
      <div class="main-content">
      	<section class="section">
      		<div class="section-header">
      			<h1>Dashboard</h1>
      		</div>
      		<div class="row">
      			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
      				<div class="card card-statistic-1">
      					<div class="card-icon bg-primary">
      						<i class="fa fa-book-open fa-2x" style="color:#ffffff;"></i>
      					</div>
      					<div class="card-wrap">
      						<div class="card-header">
      							<h4>Mata Kuliah</h4>
      						</div>
      						<div class="card-body">
      							<?= $matakuliah; ?>
      						</div>
      					</div>
      				</div>
      			</div>
      			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
      				<div class="card card-statistic-1">
      					<div class="card-icon bg-danger">
      						<i class="fa fa-users fa-2x" style="color:#ffffff;"></i>
      					</div>
      					<div class="card-wrap">
      						<div class="card-header">
      							<h4>Dosen</h4>
      						</div>
      						<div class="card-body">
      							<?= $dosen; ?>
      						</div>
      					</div>
      				</div>
      			</div>
      			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
      				<div class="card card-statistic-1">
      					<div class="card-icon bg-warning">
      						<i class="fa fa-building fa-2x" style="color:#ffffff;"></i>
      					</div>
      					<div class="card-wrap">
      						<div class="card-header">
      							<h4>Kelas</h4>
      						</div>
      						<div class="card-body">
      							<?= $kelas; ?>
      						</div>
      					</div>
      				</div>
      			</div>
      		</div>
      	</section>

      	<div class="row">
      		<div class="col-12">
      			<div class="card">
      				<div class="card-header">
      					<h4>Daftar Pengajuan Pembukaan Matakuliah</h4>
      				</div>
      				<div class="card-body">
      					<div class="table-responsive">
      						<table class="table table-striped" id="table-1">
      							<thead>
      								<tr>
      									<th>NPM</th>
      									<th>Nama Mahasiswa</th>
      									<th>Email</th>
      									<!-- <th>No Telp</th> -->
      									<th>Aksi</th>
      								</tr>
      							</thead>
      							<tbody>
								  <?php foreach($pengajuan as $_pengajuan): ?>
      							<tr>
      								<td><?= $_pengajuan->npm; ?></td>
      								<td><?= $_pengajuan->nama_mahasiswa; ?></td>
      								<td><?= $_pengajuan->konten; ?></td>
      								<!-- <td><?= $_pengajuan->no_telp; ?></td> -->
      								<td>
      									<?= anchor(base_url('kaprodi/dashboard/delete_pengajuan/'. $_pengajuan->id_pengajuan), '<div class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete"><i class="fas fa-trash"></i></div>')?>
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
