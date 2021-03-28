<div class="main-content-container container-fluid px-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
        <span class="text-uppercase page-subtitle">Admin</span>
        <h3 class="page-title">Edit Data Kelas</h3>
        </div>
    </div>
    <!-- End Page Header -->

    <!-- CONTENT GOES HERE -->
    <div class="row">
        <div class="col-10 offset-sm-1 col-lg-8 offset-lg-2">
            <div class="card">
                <?php echo form_open('kelas/editData/'.$dataKelas->id_kelas); ?>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="tingkat">Tingkat Kelas</label>
                            <select class="custom-select <?= (form_error('tingkat')) ? 'is-invalid' : '' ?>" name="tingkat" required>
                                <?php foreach ($dataTingkat as $key => $result) { ?>
                                    <option value="<?= $result->tingkat_kelas ?>" <?= ($dataKelas->tingkat_kelas == $result->tingkat_kelas) ? 'selected' : '' ;?>><?= $result->tingkat_kelas ?></option>
                                <?php } ?>
                            </select>
                            <?php if (form_error('tingkat')) : ?>
                                <div class="invalid-feedback">
                                    <?= form_error('tingkat') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="kejuruan">Kompetensi Keahlian</label>
                            <select class="custom-select<?= (form_error('kejuruan')) ? 'is-invalid' : '' ?>" name="kejuruan" required>
                                <?php foreach ($dataKejuruan as $key => $result) { ?>
                                    <option value="<?= $result->id_kejuruan ?>" <?= ($dataKelas->id_kejuruan == $result->id_kejuruan) ? 'selected' : '' ;?>><?= $result->kompetensi_keahlian ?></option>
                                <?php } ?>
                            </select>
                            <?php if (form_error('kejuruan')) : ?>
                                <div class="invalid-feedback">
                                    <?= form_error('kejuruan') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Kelas</label>
                            <input type="text" class="form-control <?= (form_error('nama')) ? 'is-invalid' : '' ?>" id="" placeholder="" name="nama" maxlength="10" value="<?= $dataKelas->nama_kelas ?>">
                            <?php if (form_error('nama')) : ?>
                                <div class="invalid-feedback">
                                    <?= form_error('nama') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <button type="submit" class="btn btn-success btn-block mt-5">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>