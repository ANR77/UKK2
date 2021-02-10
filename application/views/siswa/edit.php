<div class="main-content-container container-fluid px-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
        <span class="text-uppercase page-subtitle">Admin</span>
        <h3 class="page-title">Edit Data Siswa</h3>
        </div>
    </div>
    <!-- End Page Header -->

    <!-- CONTENT GOES HERE -->
    <div class="row">
        <div class="col-12 col-lg-10 offset-lg-1">
            <div class="card">
                <form action="<?= base_url('siswa/editData/'.$dataSiswa->nisn) ?>" method="post">
                    <div class="card-body row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="nisn">NISN</label>
                                <input type="text" class="form-control <?= (form_error('nisn')) ? 'is-invalid' : '' ?>" id="" placeholder="" name="nisn" maxlength="10" required value="<?= $dataSiswa->nisn ?>">
                                <?php if (form_error('nisn')) : ?>
                                    <div class="invalid-feedback">
                                        <?= form_error('nisn') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="nis">NIS</label>
                                <input type="text" class="form-control <?= (form_error('nis')) ? 'is-invalid' : '' ?>" id="" placeholder="" name="nis" maxlength="8" required required value="<?= $dataSiswa->nis ?>">
                                <?php if (form_error('nis')) : ?>
                                    <div class="invalid-feedback">
                                        <?= form_error('nis') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama Siswa</label>
                                <input type="text" class="form-control <?= (form_error('nama')) ? 'is-invalid' : '' ?>" id="" placeholder="" name="nama" maxlength="35" required required value="<?= $dataSiswa->nama ?>">
                                <?php if (form_error('nama')) : ?>
                                    <div class="invalid-feedback">
                                        <?= form_error('nama') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="kelas">Kelas</label>
                                <select class="custom-select <?= (form_error('kelas')) ? 'is-invalid' : '' ?>" name="kelas" required>
                                    <?php for ($i=0; $i < count($dataKelas); $i++) { ?>
                                        <option value="<?= $dataKelas[$i]['id_kelas'] ?>" <?= ($dataKelas[$i]['id_kelas'] == $dataSiswa->id_kelas) ? 'selected' : '' ; ?>><?=$dataKelas[$i]['kelas'] ?></option>
                                    <?php } ?>
                                </select>
                                <?php if (form_error('kelas')) : ?>
                                    <div class="invalid-feedback">
                                        <?= form_error('kelas') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control" id="alamat" rows="9" name="alamat"><?= $dataSiswa->alamat ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="no_telp">No. Telepon</label>
                                <input type="text" class="form-control <?= (form_error('no_telp')) ? 'is-invalid' : '' ?>" id="" placeholder="" name="no_telp" maxlength="13" value="<?= $dataSiswa->no_telp ?>">
                                <?php if (form_error('no_telp')) : ?>
                                    <div class="invalid-feedback">
                                        <?= form_error('no_telp') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block mt-5">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>