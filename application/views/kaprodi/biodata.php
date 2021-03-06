  <!-- Main Content -->
  <div class="main-content">
  	<section class="section">
  		<div class="section-header">
  			<h1>Profile</h1>
  		</div>
  		<div class="section-body">
  			<div class="row mt-sm-4">
  				<div class="col-12 col-md-12 col-lg-5">
  					<div class="card profile-widget">
  						<div class="profile-widget-header">
  							<img alt="image" src="<?= base_url('assets') ?>/img/avatar/avatar-1.png"
  								class="rounded-circle profile-widget-picture">
  							<div class="profile-widget-items">
  								<div class="profile-widget-item">
  									<div class="profile-widget-item-label">Kode User</div>
  									<div class="profile-widget-item-value"><?= $this->session->userdata('id') ?>
  									</div>
  								</div>
  								<div class="profile-widget-item">
  									<div class="profile-widget-item-label">Nama</div>
  									<div class="profile-widget-item-value"><?= $this->session->userdata('nama') ?>
  									</div>
  								</div>
  							</div>
  						</div>
  					</div>
  					<div class="card">
  						<div class="card-body">
  							<ul class="list-group list-group-flush">
  								<li class="list-group-item">
                                    <p class="font-weight-bold mb-0">Kode</p> 
                                    <p class="mb-0"><?= $this->session->userdata('id'); ?></p> 
                                </li>
                                <li class="list-group-item">
                                    <p class="font-weight-bold mb-0">Nama</p> 
                                    <p class="mb-0"><?= $this->session->userdata('nama'); ?></p> 
                                </li>
                                <li class="list-group-item">
                                    <p class="font-weight-bold mb-0">Email</p> 
                                    <p class="mb-0"><?= $this->session->userdata('email'); ?></p> 
                                </li>
  							</ul>
  						</div>
  					</div>
  				</div>
  			</div>
  	</section>
  </div>