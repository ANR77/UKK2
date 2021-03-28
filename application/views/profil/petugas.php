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
    <link rel="stylesheet" href="<?= base_url('assets/toastr/build/toastr.min.css') ?>">
    <div class="card">
        <div class="card-body">
            <form class="row" method="post" action="<?= base_url('profil/ubahData/'.$dataPetugas['id_petugas']) ?>">
                <div class="col-6">
                    <div class="form-group">
                        <label for="nama">Nama Petugas</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $dataPetugas['nama_petugas'] ?>" readonly>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="level">Level</label>
                        <input type="text" class="form-control" id="level" value="<?= $dataPetugas['level'] ?>" readonly>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?= $dataPetugas['username'] ?>" readonly>
                    </div>
                </div>
                <div class="col-6">
                    <div id="ubah-password" class="form-group">
                        <label for="password">Password</label>
                        <button type="button" id="btn-ubahPass" class="btn btn-success d-block" onclick="btnUbahPassword(<?= $dataPetugas['id_petugas'] ?>)">Ubah Password</button>
                    </div>
                </div>
                <div class="col-6">
                    <div id="ubah" class="form-group mt-3">
                        <button type="button" id="btn-ubahData" class="btn btn-secondary d-block btn-ubah"><i class="fas fa-edit mr-2"></i> Edit Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="<?= base_url('assets/toastr/build/toastr.min.js') ?>"></script>
<script src="<?= base_url('assets/js/profil.js') ?>"></script>
<script>
    <?php 
        if ($this->session->flashdata('status') == 'success') {
            echo 'toastr.success("'.$this->session->flashdata('pesan').'")';
        } elseif ($this->session->flashdata('status') == 'fail') {
            echo 'toastr.error("'.$this->session->flashdata('pesan').'")';
        }
    ?>
</script>