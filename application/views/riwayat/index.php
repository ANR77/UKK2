<div class="main-content-container container-fluid px-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
        <span class="text-uppercase page-subtitle"><?= $this->session->level ?></span>
        <h3 class="page-title">Riwayat Pembayaran</h3>
        </div>
    </div>
    <!-- End Page Header -->

    <link rel="stylesheet" href="<?= base_url('assets/dataTables/datatables.min.css') ?>">

    <!-- CONTENT GOES HERE -->
    <div class="card">
        <div class="card-body">
            <table id="tabel-riwayat" class="table-hover table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NISN</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Tanggal Bayar</th>
                        <th>Jumlah Bayar</th>
                        <th>Petugas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i=0; $i < count($dataRiwayat); $i++) { ?>
                        <tr>
                            <td><?= $i+1 ?></td>
                            <td><?= $dataRiwayat[$i]['nisn'] ?></td>
                            <td><?= $dataRiwayat[$i]['nama'] ?></td>
                            <td><?= $dataRiwayat[$i]['kelas_full'] ?></td>
                            <td><?= $dataRiwayat[$i]['tgl_bayar'] ?></td>
                            <td class="nominal"><?= $dataRiwayat[$i]['jumlah_bayar'] ?></td>
                            <td><?= $dataRiwayat[$i]['nama_petugas'] ?></td>
                            <td>
                                <a class="btn btn-success px-2 py-1" onclick="showDetail(<?= $dataRiwayat[$i]['id_pembayaran'] ?>)"><i class="fas fa-info"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalDetail" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title">Tanggal Bayar : <span id="tgl-bayar"></span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5 class="mb-3">Data Siswa :</h5>
                    <div class="row pl-2">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="nisn">NISN</label>
                                <input type="text" class="form-control" id="nisn" readonly>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="nama-siswa">Nama Siswa</label>
                                <input type="text" class="form-control" id="nama-siswa" readonly>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="kelas">Kelas</label>
                                <input type="text" class="form-control" id="kelas" readonly>
                            </div>
                        </div>
                    </div>
                    <h5 class="mt-3 mb-3">Data Pembayaran :</h5>
                    <div class="row pl-2">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="bulan">SPP Bulan</label>
                                <input type="text" class="form-control" id="bulan" readonly>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="nama-petugas">Nama Petugas</label>
                                <input type="text" class="form-control" id="nama-petugas" readonly>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="jumlah-bayar">Jumlah Bayar</label>
                                <input type="text" class="form-control" id="jumlah-bayar" readonly>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="kembalian">Kembalian</label>
                                <input type="text" class="form-control" id="kembalian" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url('assets/dataTables/datatables.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/riwayat.js') ?>"></script>

    <script>
        $(document).ready( function () {
            $('#tabel-riwayat').DataTable();
        });
        $('.nominal').each(function() {
            let temp = "Rp. "+$(this).text().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            $(this).html(temp);
        });
    </script>

</div>