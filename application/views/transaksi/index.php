<div id="div-parent" class="main-content-container container-fluid p-4">
    <!-- Page Header -->
    <!-- <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
        <span class="text-uppercase page-subtitle"><?= $this->session->level ?></span>
        <h3 class="page-title">Transaksi</h3>
        </div>
    </div> -->
    <!-- End Page Header -->

    <link rel="stylesheet" href="<?= base_url('assets/dataTables/datatables.min.css') ?>">

    <!-- CONTENT GOES HERE -->
    <div class="row h-100">
        <!-- TABLE SELECT SISWA -->
        <div class="col-12">
            <div id="card-siswa" class="card p-4">
                <div class="card-header p-0">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-search"><i class="fas fa-search pr-2"></i> Search Siswa</button>
                </div>
                <div class="card-body overflow-auto position-relative p-0">
                    <table id="tabel-spp" class="table-hover table-striped mt-md-4">
                        <thead>
                            <tr>
                                <th>Aksi</th>
                                <th>Kode</th>
                                <th>Keterangan</th>
                                <th>Nominal</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Search Siswa-->
    <div class="modal fade" id="modal-search" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header border-0 px-4">
                    <h5 class="modal-title" id="exampleModalLabel">Search Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body pt-0 px-4">
                    <div class="row">
                        <div class="col-6">
                            <div class="input-group mb-3">
                                <input type="text" name="search-siswa" id="search-siswa" class="form-control" placeholder="NISN atau Nama Siswa">
                                <div class="input-group-append">
                                    <button id="btn-search" class="input-group-text btn btn-primary"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <table id="tabel-siswa" class="table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Aksi</th>
                                        <th>NISN</th>
                                        <th>Nama</th>
                                        <th>Kelas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url('assets/dataTables/datatables.min.js') ?>"></script>

    <script>
        $(document).ready( function () {
            $('#tabel-siswa').DataTable({
                dom: 't',
                "paging": false,
                "language": {
                    "emptyTable": "Silahkan cari data siswa melalui search box"
                }
            });
            $('#tabel-spp').DataTable({
                dom: 't',
                "paging": false,
                "language": {
                    "emptyTable": "Silahkan cari data siswa melalui button search siswa"
                }
            });
        });
    </script>

    <script src="<?= base_url('assets/js/transaksi.js') ?>"></script>
</div>