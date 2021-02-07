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
                                <input type="text" class="form-control rounded-0" id="username" name="username">
                            </div>
                            <div class="form-group">
                                <label for="passsword">Password</label>
                                <input type="password" class="form-control rounded-0" id="password" name="password">
                            </div>
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
    </body>
</html>