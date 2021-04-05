<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-start mb-5">
    <a href="<?= base_url('siswa') ?>" class="btn-back"><i class="fas text-success fa-arrow-circle-left mr-2"></i></a>
    <h1 class="h3 mb-0 text-gray-800">Edit Data Siswa</h1>
</div>

<!-- CONTENT GOES HERE -->
<div class="row">
    <div class="col-12 col-lg-10 offset-lg-1">
        <div class="card shadow">
            <form action="<?= base_url('siswa/editData/'.$dataSiswa->nisn) ?>" method="post">
                <div class="card-body row p-4">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="nisn">NISN</label>
                            <input type="text" class="form-control <?= (form_error('nisn')) ? 'is-invalid' : '' ?>" id="" placeholder="" name="nisn" maxlength="10" required value="<?= $dataSiswa->nisn ?>" readonly>
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
                                <option value="">- Silahkan Pilih -</option>
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
                            <textarea class="form-control" id="alamat" rows="8" name="alamat"><?= $dataSiswa->alamat ?></textarea>
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
                    <div class="col-12">
                        <button type="submit" class="btn btn-success btn-block mt-5">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>