<div class="main-content-container container-fluid px-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
        <span class="text-uppercase page-subtitle">Admin</span>
        <h3 class="page-title">Tambah Data Petugas</h3>
        </div>
    </div>
    <!-- End Page Header -->

    <!-- CONTENT GOES HERE -->
    <div class="row">
        <div class="col-10 offset-sm-1 col-lg-8 offset-lg-2">
            <div class="card">
                <?php echo form_open('petugas/createData'); ?>
                    <div class="card-body row">
                        <div class="form-group col-12 col-lg-6">
                            <label for="username">Username</label>
                            <input type="text" class="form-control <?= (form_error('username')) ? 'is-invalid' : '' ?>" id="" placeholder="" name="username" maxlength="25" required>
                            <?php if (form_error('username')) : ?>
                                <div class="invalid-feedback">
                                    <?= form_error('username') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group col-12 col-lg-6">
                            <label for="password">Password</label>
                            <input type="text" class="form-control <?= (form_error('password')) ? 'is-invalid' : '' ?>" id="" placeholder="" name="password" maxlength="32" required>
                            <?php if (form_error('password')) : ?>
                                <div class="invalid-feedback">
                                    <?= form_error('password') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group col-12 col-lg-6">
                            <label for="nama_petugas">Nama Petugas</label>
                            <input type="text" class="form-control <?= (form_error('nama_petugas')) ? 'is-invalid' : '' ?>" id="" placeholder="" name="nama_petugas" maxlength="35" required>
                            <?php if (form_error('nama_petugas')) : ?>
                                <div class="invalid-feedback">
                                    <?= form_error('nama_petugas') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group col-12 col-lg-6">
                            <label for="level">Level</label>
                            <select class="custom-select <?= (form_error('level')) ? 'is-invalid' : '' ?>" name="level" required>
                                <option value="">- Silahkan Pilih -</option>
                                <option value="admin">Admin</option>
                                <option value="petugas">Petugas</option>
                            </select>
                            <?php if (form_error('level')) : ?>
                                <div class="invalid-feedback">
                                    <?= form_error('level') ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block mt-5">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>