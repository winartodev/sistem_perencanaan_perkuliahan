<body>
	<div id="app">
		<div class="main-wrapper main-wrapper-1">
			<div class="navbar-bg"></div>
			<nav class="navbar navbar-expand-lg main-navbar">
				<form class="form-inline mr-auto">
					<ul class="navbar-nav mr-3">
						<li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
									class="fas fa-bars"></i></a></li>
						<li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
									class="fas fa-search"></i></a></li>
					</ul>
					<div class="search-element">
						<input class="form-control" type="search" placeholder="Search" aria-label="Search"
							data-width="250">
						<button class="btn" type="submit"><i class="fas fa-search"></i></button>
					</div>
				</form>
				<ul class="navbar-nav navbar-right">
					<li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
							class="nav-link nav-link-lg message-toggle"><i class="far fa-envelope"></i></a>
						<div class="dropdown-menu dropdown-list dropdown-menu-right">
							<div class="dropdown-header">Messages
								<div class="float-right">
									<a href="#">Mark All As Read</a>
								</div>
							</div>
							<div class="dropdown-footer text-center">
								<a href="#">View All <i class="fas fa-chevron-right"></i></a>
							</div>
						</div>
					</li>
					<li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
							class="nav-link notification-toggle nav-link-lg"><i class="far fa-bell"></i></a>
						<div class="dropdown-menu dropdown-list dropdown-menu-right">
							<div class="dropdown-header">Notifications
								<div class="float-right">
									<a href="#">Mark All As Read</a>
								</div>
							</div>
							<div class="dropdown-footer text-center">
								<a href="#">View All <i class="fas fa-chevron-right"></i></a>
							</div>
						</div>
					</li>
					<li class="dropdown"><a href="#" data-toggle="dropdown"
							class="nav-link dropdown-toggle nav-link-lg nav-link-user">
							<img alt="image" src="<?= base_url('assets')?>/img/avatar/avatar-1.png" class="rounded-circle mr-1">
							<div class="d-sm-none d-lg-inline-block">Hi, <?= $this->session->userdata('nama_mhs'); ?></div>
						</a>
						<div class="dropdown-menu dropdown-menu-right">
							<div class="dropdown-title">-----</div>
							<a href="<?= base_url('mahasiswa/biodata/info/'.$this->session->userdata('npm')) ?>" class="dropdown-item has-icon">
								<i class="far fa-user"></i> Profile
							</a>
							<a href="" class="dropdown-item has-icon">
								<i class="fas fa-bolt"></i> Activities
							</a>
							<a href="" class="dropdown-item has-icon">
								<i class="fas fa-cog"></i> Settings
							</a>
							<div class="dropdown-divider"></div>
							<a href="<?= base_url('guest/logout')?>" class="dropdown-item has-icon text-danger">
								<i class="fas fa-sign-out-alt"></i> Logout
							</a>
						</div>
					</li>
				</ul>
			</nav>
			<div class="main-sidebar sidebar-style-2">
				<aside id="sidebar-wrapper">
					<div class="sidebar-brand">
						<a href="<?= base_url('mahasiswa/dashboard') ?>">SIPERKUL</a>
					</div>
					<div class="sidebar-brand sidebar-brand-sm">
						<a href="<?= base_url('mahasiswa/dashboard') ?>">SPK</a>
					</div>
					<ul class="sidebar-menu">
						<li class="menu-header">Dashboard</li>
						<li>
							<a href="<?= base_url('mahasiswa/dashboard') ?>" class="nav-link"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a>
						</li>
						<li>
							<a href="<?= base_url('mahasiswa/biodata/info/'.$this->session->userdata('npm')) ?>" class="nav-link"><i class="fas fa-user"></i><span>Data Mahasiswa</span></a>
						</li>
						<li class="menu-header">Main</li>
						<li>
							<a href="<?= base_url('mahasiswa/pra_perencanaan')?>" class="nav-link"><i class="fas fa-book"></i>
								<span>Input Perencanaan</span>
							</a>
						</li>
						<li>
							<a href="<?= base_url('mahasiswa/perencanaan')?>" class="nav-link"><i class="fas fa-book"></i>
								<span>Perencanaan</span>
							</a>
						</li>
						<li>
							<a href="<?= base_url('mahasiswa/pengajuan')?>" class="nav-link"><i class="fas fa-building"></i>
								<span>Pengajuan Pembukaan MK</span>
							</a>
						</li>
						<li class="menu-header">Settings</li>
						<li>
							<a  href="<?= base_url('mahasiswa/biodata/email_mahasiswa/'.$this->session->userdata('npm')) ?>" class="nav-link"><i class="fas fa-envelope"></i>
								<span>Buat Email Mahasiswa</span>
							</a>
						</li>
						<li>
							<a  href="<?= base_url('mahasiswa/biodata/ubah_password/'.$this->session->userdata('npm')) ?>" class="nav-link"><i class="fas fa-key"></i>
								<span>Ubah User Password</span>
							</a>
						</li>
						<li>
							<a  href="<?= base_url('guest/logout')?>" class="nav-link"><i class="fas fa-times"></i>
								<span>Logout</span>
							</a>
						</li>
					</ul>
				</aside>
			</div>
