<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-start mb-5">
    <a href="<?= base_url('petugas') ?>" class="btn-back"><i class="fas fa-arrow-circle-left text-success mr-2"></i></a>
    <h1 class="h3 mb-0 text-gray-800">Tambah Data Petugas</h1>
</div>

<!-- CONTENT GOES HERE -->
<div class="row">
    <div class="col-10 offset-sm-1 col-lg-8 offset-lg-2">
        <div class="card shadow">
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
                        <label for="level">Level</label>
                        <input class="form-control <?= (form_error('level')) ? 'is-invalid' : '' ?>" name="level" value="petugas" readonly required>
                        <?php if (form_error('level')) : ?>
                            <div class="invalid-feedback">
                                <?= form_error('level') ?>
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
                        <label for="password">Password</label>
                        <input type="text" class="form-control <?= (form_error('password')) ? 'is-invalid' : '' ?>" id="" placeholder="" name="password" maxlength="32" required>
                        <?php if (form_error('password')) : ?>
                            <div class="invalid-feedback">
                                <?= form_error('password') ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-success btn-block mt-5">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>