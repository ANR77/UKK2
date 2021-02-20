<!-- Main Sidebar -->
<aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
    <div class="main-navbar">
        <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
            <a class="navbar-brand w-100 mr-0" href="#" style="line-height: 25px;">
                <div class="d-table m-auto">
                    <img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 25px;" src="<?= base_url('assets/template/') ?>images/shards-dashboards-logo.svg" alt="Shards Dashboard">
                    <span class="d-none d-md-inline ml-1">ASpp</span>
                </div>
            </a>
            <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none">
                <i class="material-icons">&#xE5C4;</i>
            </a>
        </nav>
    </div>
    <div class="nav-wrapper">
        <ul class="nav flex-column">
            <!-- ADMIN -->
            <?php if ($this->session->level == 'admin') { ?>
                <li class="nav-item">
                    <a class="nav-link <?= ($title == 'Dashboard') ? "active" : " " ; ?>" href="<?= base_url('/') ?>">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
            <?php }?>
            <?php if ($this->session->level == 'admin') { ?>
                <li class="nav-item">
                    <a class="nav-link <?= ($title == 'Transaksi') ? "active" : " " ; ?>" href="components-blog-posts.html">
                        <i class="fas fa-cash-register"></i>
                        <span>Transaksi</span>
                    </a>
                </li>
            <?php }?>
            <?php if ($this->session->level == 'admin') { ?>
                <li class="nav-item">
                    <a class="nav-link <?= ($title == 'Data Siswa') ? "active" : " " ; ?>" href="<?= base_url('siswa') ?>">
                        <i class="fas fa-user-graduate"></i>
                        <span>Data Siswa</span>
                    </a>
                </li>
            <?php }?>
            <?php if ($this->session->level == 'admin') { ?>
                <li class="nav-item">
                    <a class="nav-link <?= ($title == 'Data Kelas') ? "active" : " " ; ?>" href="<?= base_url('kelas') ?>">
                        <i class="fas fa-school"></i>
                        <span>Data Kelas</span>
                    </a>
                </li>
            <?php }?>
            <?php if ($this->session->level == 'admin') { ?>
                <li class="nav-item">
                    <a class="nav-link <?= ($title == 'Data Petugas') ? "active" : " " ; ?>" href="<?= base_url('petugas') ?>">
                        <i class="fas fa-user-tie"></i>
                        <span>Data Petugas</span>
                    </a>
                </li>
            <?php }?>
            <?php if ($this->session->level == 'admin') { ?>
                <li class="nav-item">
                    <a class="nav-link <?= ($title == 'Data SPP') ? "active" : " " ; ?>" href="<?= base_url('spp') ?>">
                        <i class="fas fa-file-invoice"></i>
                        <span>Data SPP</span>
                    </a>
                </li>
            <?php }?>
            <?php if ($this->session->level == 'admin') { ?>
                <li class="nav-item">
                    <a class="nav-link <?= ($title == 'History') ? "active" : " " ; ?>" href="components-blog-posts.html">
                        <i class="fas fa-history"></i>
                        <span>History</span>
                    </a>
                </li>
            <?php }?>
            <!-- PETUGAS -->
            <?php if ($this->session->level == 'petugas') { ?>
                <li class="nav-item">
                    <a class="nav-link <?= ($title == 'Dashboard') ? "active" : " " ; ?>" href="add-new-post.html">
                        <i class="fas fa-cash-register"></i>
                        <span>Transaksi</span>
                    </a>
                </li>
            <?php }?>
            <?php if ($this->session->level == 'petugas') { ?>
                <li class="nav-item">
                    <a class="nav-link <?= ($title == 'History') ? "active" : " " ; ?>" href="add-new-post.html">
                        <i class="fas fa-history"></i>
                        <span>History</span>
                    </a>
                </li>
            <?php }?>
            <!-- SISWA -->
            <?php if ($this->session->level == 'siswa') {  ?>
                <li class="nav-item <?= ($title == 'Profil') ? "active" : " " ; ?>">
                    <a class="nav-link " href="form-components.html">
                    <i class="fas fa-user"></i>
                        <span>Profil</span>
                    </a>
                </li>
            <?php }?>
            <?php if ($this->session->level == 'siswa') {  ?>
                <li class="nav-item <?= ($title == 'History') ? "active" : " " ; ?>">
                    <a class="nav-link " href="form-components.html">
                        <i class="fas fa-history"></i>
                        <span>History</span>
                    </a>
                </li>
            <?php }?>
        </ul>
    </div>
</aside>
<!-- End Main Sidebar -->

<!-- Navbar.php -->