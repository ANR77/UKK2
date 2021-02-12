<!doctype html>
<html class="no-js h-100" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>App Spp - <?= $title ?></title>
        <meta name="description" content="A high-quality &amp; free Bootstrap admin dashboard template pack that comes with lots of templates and components.">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="<?= base_url('assets/fontawesome/css/all.min.css') ?>" rel="stylesheet"><!-- FONTAWESOME -->
        <link rel="stylesheet" href="<?= base_url('assets/css/styleVanilla.css') ?>">
        <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css') ?>" crossorigin="anonymous"><!-- BOOTSTRAP -->
    </head>
    <body class="h-100">
        <div class="container-fluid h-100">
            <div class="row flex-row align-items-center h-100">
                <div class="container-fluid col-10 offset-sm-1 col-lg-4 offset-lg-4 card shadow border-0 p-0 rounded-0">
                    <h3 class="card-header bg-primary text-light py-3 text-center rounded-0"><i class="fas fa-file-invoice mr-2"></i>SApp</h3>
                    <div class="card-body p-5">
                        <form action="<?= base_url('login/auth') ?>" method="post">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control rounded-0 <?= (form_error('username')) ? 'is-invalid' : '' ?>" id="username" name="username" required maxlength="25"  value="<?= set_value('username'); ?>">
                                <?php if (form_error('username')) : ?>
                                    <div class="invalid-feedback">
                                        <?= form_error('username') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="passsword">Password</label>
                                <input type="password" class="form-control rounded-0 <?= (form_error('password')) ? 'is-invalid' : '' ?>" id="password" name="password" required>
                                <?php if (form_error('password')) : ?>
                                    <div class="invalid-feedback">
                                        <?= form_error('password') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <?= ($this->session->error_login) ? '<p class="text-danger text-center"><i class="fas fa-exclamation-circle mr-2"></i>Username atau Password salah !</p>' : '' ; ?>
                            <span class="login-siswa" data-toggle="modal" data-target="#modalLogin">Login Siswa</span>
                            <button type="submit" class="btn btn-primary w-100 mt-5 rounded-0">Submit</button>
                        </form>
                    </div>
                </div>
                <footer class="d-flex p-2 px-3 bg-white border-top w-100 justify-content-center">
                    <span class="align-self-center">Copyright © 2021 Aplikasi SPP</span>
                </footer>
            </div>
        </div>
        <script src="<?= base_url('assets/js/jquery.js') ?>" crossorigin="anonymous"></script>
        <script src="<?= base_url('assets/bootstrap/js/bootstrap.bundle.min.js') ?>" crossorigin="anonymous"></script>
        <div class="modal fade" id="modalLogin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Login Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('login/loginSiswa') ?>" method="post" class="form-row">
                        <div class="form-group col-12">
                            <label for="nisn">NISN</label>
                            <input type="type" class="form-control" name="nisn" required>
                        </div>
                        <div class="form-group col-12">
                            <label for="nis">NIS</label>
                            <input type="type" class="form-control" name="nis" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </div>
            </div>
        </div>
    </body>
</html>