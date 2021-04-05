<!doctype html>
<html class="no-js h-100" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>App Spp - <?= $title ?></title>
        <link rel="icon" href="<?= base_url('assets/img/tab-icon.png') ?>">
        <meta name="description" content="A high-quality &amp; free Bootstrap admin dashboard template pack that comes with lots of templates and components.">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="<?= base_url('assets/fontawesome/css/all.min.css') ?>" rel="stylesheet"><!-- FONTAWESOME -->
        <link rel="stylesheet" href="<?= base_url('assets/css/styleVanilla.css') ?>">
        <link rel="stylesheet" href="<?= base_url('assets/sbadmin/css/sb-admin-2.min.css') ?>" crossorigin="anonymous"><!-- sbadmin-bootstrap -->
    </head>
    <body class="h-100">
        <div class="container-fluid h-100">
            <div class="row flex-row align-items-center h-100">
                <div class="container-fluid col-10 offset-sm-1 offset-md-3 col-lg-4 offset-lg-4 card shadow border-0 p-0">
                    <h3 class="card-header bg-success text-light py-3 text-center"><i class="fas fa-file-invoice mr-2"></i>SApp</h3>
                    <div class="card-body p-5">
                        <form action="<?= base_url('login/loginSiswa') ?>" method="post" autocomplete="off">
                            <div class="form-group">
                                <label for="nisn">NISN</label>
                                <input type="text" class="form-control" id="nisn" name="nisn" required maxlength="25"  value="<?= set_value('nisn'); ?>">
                            </div>
                            <div class="form-group">
                                <label for="passsword">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <?= ($this->session->error_login) ? '<p class="text-danger text-center"><i class="fas fa-exclamation-circle mr-2"></i>NISN atau Password salah !</p>' : '' ; ?>
                            <span class="login-petugas cursor-pointer text-success" data-toggle="modal" data-target="#modalLogin">Login Petugas</span>
                            <button type="submit" class="btn btn-success w-100 mt-5">Login</button>
                        </form>
                    </div>
                </div>
                <footer class="d-flex p-2 px-3 bg-white border-top w-100 justify-content-center">
                    <span class="align-self-center">Copyright © ANR 2021</span>
                </footer>
            </div>
        </div>
        <script src="<?= base_url('assets/js/jquery.js') ?>" crossorigin="anonymous"></script>
        <script src="<?= base_url('assets/bootstrap/js/bootstrap.bundle.min.js') ?>" crossorigin="anonymous"></script>
        <div class="modal fade" id="modalLogin" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Login Petugas</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body py-4 px-5">
                        <form action="<?= base_url('login/auth') ?>" method="post" class="form-row" autocomplete="off">
                            <div class="form-group col-12">
                                <label for="username">Username</label>
                                <input type="type" class="form-control" name="username" required>
                            </div>
                            <div class="form-group col-12">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                            <?= ($this->session->error_login_p) ? '<p class="text-danger m-auto"><i class="fas fa-exclamation-circle mr-2"></i>Username atau Password salah !</p>' : '' ; ?>
                            <button type="submit" class="btn btn-success btn-block mt-4 mb-3">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
            <?= ($this->session->error_login_p) ? "$('#modalLogin').modal('show');" : "" ; ?>
        </script>
    </body>
</html>