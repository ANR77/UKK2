<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <i class="fas fa-file-invoice"></i>
        </div>
        <div class="sidebar-brand-text mx-3">ASpp</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- ADMIN & PETUGAS -->
    <?php if ($this->session->level == 'admin') { ?>
        <li class="nav-item <?= ($title == 'Dashboard') ? "active" : " " ; ?>">
            <a class="nav-link" href="<?= base_url('/') ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>
    <?php }?>
    <?php if ($this->session->level == 'admin' || $this->session->level == 'petugas') { ?>
        <li class="nav-item <?= ($title == 'Transaksi') ? "active" : " " ; ?>">
            <a class="nav-link" href="<?= base_url('transaksi') ?>">
                <i class="fas fa-fw fa-cash-register"></i>
                <span>Transaksi</span>
            </a>
        </li>
    <?php }?>
    <?php if ($this->session->level == 'admin' || $this->session->level == 'petugas') { ?>
        <li class="nav-item <?= ($title == 'Riwayat Pembayaran') ? "active" : " " ; ?>">
            <a class="nav-link" href="<?= base_url('riwayat') ?>">
                <i class="fas fa-fw fa-history"></i>
                <span>Riwayat Pembayaran</span>
            </a>
        </li>
    <?php }?>

    <?php if ($this->session->level == 'admin') { ?>
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
        Master Data
        </div>
        
        <li class="nav-item <?= ($title == 'Data Siswa') ? "active" : " " ; ?>">
            <a class="nav-link" href="<?= base_url('siswa') ?>">
                <i class="fas fa-fw fa-user-graduate"></i>
                <span>Data Siswa</span>
            </a>
        </li>
    <?php }?>
    <?php if ($this->session->level == 'admin') { ?>
        <li class="nav-item <?= ($title == 'Data Kelas') ? "active" : " " ; ?>">
            <a class="nav-link" href="<?= base_url('kelas') ?>">
                <i class="fas fa-fw fa-school"></i>
                <span>Data Kelas</span>
            </a>
        </li>
    <?php }?>
    <?php if ($this->session->level == 'admin') { ?>
        <li class="nav-item <?= ($title == 'Data Petugas') ? "active" : " " ; ?>">
            <a class="nav-link" href="<?= base_url('petugas') ?>">
                <i class="fas fa-fw fa-user-tie"></i>
                <span>Data Petugas</span>
            </a>
        </li>
    <?php }?>
    <?php if ($this->session->level == 'admin') { ?>
        <li class="nav-item <?= ($title == 'Data SPP') ? "active" : " " ; ?>">
            <a class="nav-link" href="<?= base_url('spp') ?>">
                <i class="fas fa-fw fa-file-invoice"></i>
                <span>Data SPP</span>
            </a>
        </li>
    <?php }?>

    <!-- SISWA -->
    <?php if ($this->session->level == 'siswa') {  ?>
        <li class="nav-item <?= ($title == 'Riwayat Pembayaran') ? "active" : " " ; ?>">
            <a class="nav-link" href="<?= base_url('riwayat/siswa/'.$this->session->nisn) ?>">
                <i class="fas fa-fw fa-history"></i>
                <span>Riwayat Pembayaran</span>
            </a>
        </li>
    <?php }?>
    <?php if ($this->session->level == 'siswa') {  ?>
        <li class="nav-item <?= ($title == 'Profil') ? "active" : " " ; ?>">
            <a class="nav-link" href="<?= base_url('profil/siswa/'.$this->session->nisn) ?>">
            <i class="fas fa-fw fa-user"></i>
                <span>Profil</span>
            </a>
        </li>
    <?php }?>

    <!-- Divider -->
    <!-- <hr class="sidebar-divider"> -->

    <!-- Heading -->
    <!-- <div class="sidebar-heading">
    Interface
    </div> -->

    <!-- Nav Item - Pages Collapse Menu -->
    <!-- <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Components</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Custom Components:</h6>
        <a class="collapse-item" href="buttons.html">Buttons</a>
        <a class="collapse-item" href="cards.html">Cards</a>
        </div>
    </div>
    </li> -->
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">
    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3"><i class="fa fa-bars"></i></button>

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">
            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $this->session->nama ?></span>
                    <img class="img-profile rounded-circle" src="<?= base_url('assets/img/user.png') ?>">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="<?= ($this->session->level == 'siswa') ? base_url('profil/siswa/'.$this->session->nisn) : base_url('profil/petugas/'.$this->session->id) ; ?>">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profil
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="<?= base_url('login/logout') ?>">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>
                        Logout
                    </a>
                </div>
            </li>
        </ul>
    </nav>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">