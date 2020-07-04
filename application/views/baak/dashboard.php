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
      						<i class="fa fa-check fa-2x" style="color:#ffffff;"></i>
      					</div>
      					<div class="card-wrap">
      						<div class="card-header">
      							<h4>Konfirmasi Baru</h4>
      						</div>
      						<div class="card-body">
      							<?= $jumlah_konfirmasi; ?>
      						</div>
      					</div>
      				</div>
      			</div>
      			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
      				<div class="card card-statistic-1">
      					<div class="card-icon bg-danger">
      						<i class="fa fa-bullhorn fa-2x" style="color:#ffffff;"></i>
      					</div>
      					<div class="card-wrap">
      						<div class="card-header">
      							<h4>Pengumuman</h4>
      						</div>
      						<div class="card-body">
      							<?= $jumlah_pengumuman; ?>
      						</div>
      					</div>
      				</div>
      			</div>
				  <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      				<div class="card card-statistic-1">
      					<div class="card-icon bg-warning">
      						<i class="fa fa-user-graduate fa-2x" style="color:#ffffff;"></i>
      					</div>
      					<div class="card-wrap">
      						<div class="card-header">
      							<h4>Mahasiswa</h4>
      						</div>
      						<div class="card-body">
      							<?= $jumlah_mahasiswa; ?>
      						</div>
      					</div>
      				</div>
      			</div>
      		</div>
      	</section>
      </div>
