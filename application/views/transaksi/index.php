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
    <link rel="stylesheet" href="<?= base_url('assets/toastr/build/toastr.min.css') ?>">

    <!-- CONTENT GOES HERE -->
    <div class="row h-100">
        <!-- TABLE SELECT SPP -->
        <div class="col-7" id="kiri">
            <div class="row">
                <div class="col-12">
                    <div class="card" id="card-spp">
                        <div class="card-header pt-4">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-search"><i class="fas fa-search pr-2"></i> Search Siswa</button>
                        </div>
                        <div class="card-body pt-0" id="card-body-spp">
                            <div class="overflow-auto" id="card-body-spp-inner">
                                <table id="tabel-spp" class="table-hover table-striped mt-md-4 mb-4">
                                    <thead>
                                        <tr>
                                            <th>Aksi</th>
                                            <th>Tahun</th>
                                            <th>Tingkat</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-3">
                    <div class="card" id="card-spp">
                        <div class="card-body" id="card-body-bulan">
                            <div class="overflow-auto" id="card-body-bulan-inner">
                                <table id="tabel-bulan" class="table-striped table-hover mt-md-4 mb-4">
                                    <thead>
                                        <tr>
                                            <th>Aksi</th>
                                            <th>Bulan</th>
                                            <th>Tahun</th>
                                            <th>Nominal</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-5" id="kanan">
            <form class="card" action="<?= base_url('transaksi/bayar') ?>" method="post">
                <!-- <div class="card-header border-bottom">
                    <p class="my-2">NISN : <span id="nisn"></span></p>
                    <p class="my-2">Nama : <span id="nama"></span></p>
                </div> -->
                <div id="kanan-atas" class="card-body row pb-0">
                    <h5 class="col-12">Detail Tagihan :</h5>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="bulan">Bulan :</label>
                            <input type="text" name="bulan" class="form-control" id="bulan" value="-" readonly>
                        </div>
                        <div class="form-group">
                            <label for="tahun">Tahun :</label>
                            <input type="text" class="form-control" id="tahun" value="-" readonly>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="tingkat">Tingkat :</label>
                            <input type="text" class="form-control" id="tingkat" value="-" readonly>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan :</label>
                            <input type="text" class="form-control text-truncate" id="keterangan" value="-" readonly>
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="tagihan">Tagihan :</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text text-black border-0" id="basic-addon1"  style="font-size : 2em;">Rp.</span>
                            </div>
                            <input type="text" id="tagihan" class="form-control border-0 bg-transparent pl-0" aria-label="Username" aria-describedby="basic-addon1" style="font-size : 2em;" value="-" readonly>
                        </div>
                    </div>
                </div>
                <div id="kanan-bawah" class="card-footer border-top">
                    <div class="form-group">
                        <label for="bayar">Bayar :</label>
                        <input type="text" name="bayar" class="form-control nominal" id="bayar" disabled>
                    </div>
                    <label for="kembalian">Kembalian :</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text text-black border-0" id="basic-addon1"  style="font-size : 2em;">Rp.</span>
                        </div>
                        <input type="text" name="kembalian" id="kembalian" class="form-control border-0 bg-transparent pl-0" aria-label="Username" aria-describedby="basic-addon1" style="font-size : 2em;" value="-" readonly>
                    </div>
                    <input type="hidden" name="nama-petugas" id="nama-petugas" value="<?= $this->session->nama ?>">
                    <input type="hidden" name="id-siswa-spp" id="id-siswa-spp">
                    <input type="hidden" name="id-siswa" id="id-siswa">
                    <input type="hidden" name="tgl-bayar" id="tgl-bayar">
                    <input type="hidden" name="id-spp" id="id-spp">
                    <input type="hidden" name="angsuran" id="angsuran">
                    <button id="btn-bayar" type="submit" class="btn btn-primary btn-block" disabled>Bayar</button>
                </div>
            </form>
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
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url('assets/dataTables/datatables.min.js') ?>"></script>
    <script src="<?= base_url('assets/cleave/dist/cleave.min.js') ?>"></script>
    <script src="<?= base_url('assets/toastr/build/toastr.min.js') ?>"></script>

    <script>
        <?php 
            if ($this->session->flashdata('status') == 'success') {
                echo 'toastr.success("'.$this->session->flashdata('pesan').'")';
            } elseif ($this->session->flashdata('status') == 'fail') {
                echo 'toastr.error("'.$this->session->flashdata('pesan').'")';
            }
        ?>
    </script>

    <script src="<?= base_url('assets/js/transaksi.js') ?>"></script>
    

    
</div>