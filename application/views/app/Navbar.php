<main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
    <div class="main-navbar sticky-top bg-white">
        <!-- Main Navbar -->
        <nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
            <div class="w-100 d-none d-md-flex d-lg-flex"></div>
            <ul class="navbar-nav border-left flex-row ">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        <img class="user-avatar rounded-circle mr-2" src="<?= base_url('assets/img/user.png') ?>" alt="User Avatar">
                        <span class="d-none d-md-inline-block"><?= $this->session->nama ?></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-small">
                        <a class="dropdown-item" href="<?= ($this->session->level == 'siswa') ? base_url('profil/siswa/'.$this->session->nisn) : base_url('profil/petugas/'.$this->session->id) ; ?>"><i class="fas fa-user mr-2"></i> Profil</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="<?= base_url('login/logout') ?>">
                        <i class="fas fa-sign-out-alt text-danger mr-2"></i> Logout </a>
                    </div>
                </li>
            </ul>
            <nav class="nav">
                <a href="#" class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center border-left" data-toggle="collapse" data-target=".header-navbar" aria-expanded="false" aria-controls="header-navbar">
                    <i class="fas fa-bars"></i>
                </a>
            </nav>
        </nav>
    </div>
    <!-- / .main-navbar -->

    <!-- PAGE CONTENT -->