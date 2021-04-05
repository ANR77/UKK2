<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Profil</h1>
</div>

<!-- CONTENT GOES HERE -->
<link rel="stylesheet" href="<?= base_url('assets/toastr/build/toastr.min.css') ?>">
<div class="card shadow">
    <div class="card-body">
        <div class="row">
            <form class="col-6" method="post" action="<?= base_url('profil/ubahData/'.$dataPetugas['id_petugas']) ?>">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="nama">Nama Petugas</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $dataPetugas['nama_petugas'] ?>" readonly>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" value="<?= $dataPetugas['username'] ?>" readonly>
                        </div>
                    </div>
                    <div class="col-12">
                        <div id="ubah" class="form-group mt-3">
                            <button type="button" id="btn-ubahData" class="btn btn-secondary d-block btn-ubah btn-sm"><i class="fas fa-edit mr-2"></i> Edit Data</button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="col-6">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="level">Level</label>
                            <input type="text" class="form-control" id="level" value="<?= $dataPetugas['level'] ?>" readonly>
                        </div>
                    </div>
                    <div class="col-12">
                        <div id="ubah-password" class="form-group">
                            <label for="password">Password</label>
                            <button type="button" id="btn-ubahPass" class="btn btn-success d-block btn-sm" onclick="btnUbahPassword(<?= $dataPetugas['id_petugas'] ?>)">Ubah Password</button>
                        </div>
                    </div>
                </div>
            </div>
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