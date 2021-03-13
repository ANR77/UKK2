<div class="main-content-container container-fluid px-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
        <span class="text-uppercase page-subtitle"><?= $this->session->level ?></span>
        <h3 class="page-title">Profil</h3>
        </div>
    </div>
    <!-- End Page Header -->

    <!-- CONTENT GOES HERE -->
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="nama">Nama Petugas</label>
                        <input type="text" class="form-control" id="nama" value="<?= $dataPetugas['nama_petugas'] ?>" <?= ($this->session->level == "admin") ? "" : "readonly" ; ?>>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="level">Level</label>
                        <input type="text" class="form-control" id="level" value="<?= $dataPetugas['level'] ?>" <?= ($this->session->level == "admin") ? "" : "readonly" ; ?>>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" value="<?= $dataPetugas['username'] ?>" <?= ($this->session->level == "admin") ? "" : "readonly" ; ?>>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="nama" value="<?= $dataPetugas['password'] ?>" <?= ($this->session->level == "admin") ? "" : "readonly" ; ?>>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>