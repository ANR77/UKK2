<div class="main-content-container container-fluid px-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
        <span class="text-uppercase page-subtitle">Siswa</span>
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
                        <label for="nisn">NISN</label>
                        <input type="text" class="form-control" id="nisn" value="<?= $dataSiswa['nisn'] ?>" readonly>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="nis">NIS</label>
                        <input type="text" class="form-control" id="nis" value="<?= $dataSiswa['nis'] ?>" readonly>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="nama_siswa">Nama Siswa</label>
                        <input type="text" class="form-control" id="nama_siswa" value="<?= $dataSiswa['nama'] ?>" readonly>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <input type="text" class="form-control" id="kelas" value="<?= $dataSiswa['kelas_full'] ?>" readonly>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" value="<?= $dataSiswa['alamat'] ?>" readonly>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="no_telp">No. Telepon</label>
                        <input type="text" class="form-control" id="no_telp" value="<?= $dataSiswa['no_telp'] ?>" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>