      <!-- Main Content -->
      <div class="main-content">
      	<section class="section">
      		<div class="section-header">
      			<h1>Dashboard</h1>
      		</div>
			<h5 class="mb-3">Selamat Datang, <?= $this->session->userdata('nama_mhs') ?> </h5>
			
      		<div class="row">
      			<div class="col-lg-3 col-md-6 col-sm-6 col-12">
      				<div class="card card-statistic-1">
      					<div class="card-icon bg-primary">
      						<i class="fa fa-book-open fa-2x" style="color:#ffffff;"></i>
      					</div>
      					<div class="card-wrap">
      						<div class="card-header">
      							<h4>Angkatan</h4>
      						</div>
      						<div class="card-body">
      							<?= $this->session->userdata('angkatan'); ?>
      						</div>
      					</div>
      				</div>
      			</div>
      		</div>
			<div class="row">
			<div class="col-lg-6 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Pengumuman</h4>
                </div>
                <div class="card-body">             
                  <ul class="list-unstyled list-unstyled-border">
				  <?php foreach($pengumuman as $_pengumuman): ?>
                    <li class="media">
                      <div class="media-body">
                        <div class="float-right text-primary"><?= $_pengumuman->tanggal ?></div>
                        <div class="media-title text-uppercase mb-3"><?= $_pengumuman->judul ?></div>
						<?= anchor(base_url('Mahasiswa/Pengumuman/Detail/'. $_pengumuman->id), '<div class="btn btn-info btn-action mr-1 text-bold" href="">Detail</div>')?>
                      </div>
                    </li>
				  <?php endforeach; ?>
                  </ul>
                </div>
              </div>
            </div>
          </div>
			</div>
      	</section>
      </div>
