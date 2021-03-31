<div class="main-content-container container-fluid px-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
        <span class="text-uppercase page-subtitle">Dashboard</span>
        <h3 class="page-title text-capitalize"><?= $this->session->level ?></h3>
        </div>
    </div>
    <!-- End Page Header -->
    
    <link rel="stylesheet" href="<?= base_url('assets/dataTables/datatables.min.css') ?>">
    
    <div class="row">
        <div class="col-sm-6 col-lg-3 mb-4">
            <div class="card card-small h-100">
                <div class="card-body px-4 py-1 d-flex position-relative overflow-hidden">
                    <div class="d-flex flex-column m-auto">
                        <div class="text-center">
                            <span class="text-uppercase label-dashboard">Transaksi Hari ini</span>
                            <h6 class="my-3 value-dashboard"><?= count($dataTransaksi) ?></h6>
                        </div>
                        <i class="fas fa-tachometer-alt text-secondary bg-icon position-absolute"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3 mb-4">
            <div class="card card-small h-100">
                <div class="card-body p-4 d-flex position-relative overflow-hidden">
                    <div class="d-flex flex-column m-auto">
                        <div class="text-center">
                            <span class="text-uppercase label-dashboard">Jumlah Siswa</span>
                            <h6 class="my-3 value-dashboard"><?= $jumlahSiswa ?></h6>
                        </div>
                        <i class="fas fa-user-graduate text-secondary bg-icon position-absolute"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3 mb-4">
            <div class="card card-small h-100">
                <div class="card-body p-4 d-flex position-relative overflow-hidden">
                    <div class="d-flex flex-column m-auto">
                        <div class="text-center">
                            <span class="text-uppercase label-dashboard">Jumlah Kelas</span>
                            <h6 class="my-3 value-dashboard"><?= $jumlahKelas ?></h6>
                        </div>
                        <i class="fas fa-school text-secondary bg-icon position-absolute"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3 mb-4">
            <div class="card card-small h-100">
                <div class="card-body p-4 d-flex position-relative overflow-hidden">
                    <div class="d-flex flex-column m-auto">
                        <div class="text-center">
                            <span class="text-uppercase label-dashboard">Jumlah Petugas</span>
                            <h6 class="my-3 value-dashboard"><?= $jumlahPetugas ?></h6>
                        </div>
                        <i class="fas fa-user-tie text-secondary bg-icon position-absolute"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">     
            <div class="card">
                <div class="card-header pb-0 text-center">
                    <h4 class="mt-2 text-success">Transaksi hari ini</h4>
                </div>
                <div class="card-body pt-2">
                    <table id="tabel-transaksi" class="table-hover table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Siswa</th>
                                <th>Jumlah Bayar</th>
                                <th>Petugas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php for ($i=0; $i < count($dataTransaksi); $i++) { ?>
                                <tr>
                                    <td><?= $i+1 ?></td>
                                    <td><?= $dataTransaksi[$i]['nama'] ?></td>
                                    <td class="nominal"><?= $dataTransaksi[$i]['jumlah_bayar'] ?></td>
                                    <td><?= $dataTransaksi[$i]['nama_petugas'] ?></td>
                                    <td>
                                        <a class="btn btn-success px-2 py-1" onclick="showDetail(<?= $dataTransaksi[$i]['id_pembayaran'] ?>)"><i class="fas fa-info"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
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
<script src="<?= base_url('assets/js/dashboard.js') ?>"></script>

<script>
    $(document).ready( function () {
        $('#tabel-transaksi').DataTable( {
                dom: 't',
                language : {
                    "emptyTable": "Belum ada transaksi"
                }
            } );
        $('.nominal').each(function() {
            let temp = "Rp. "+$(this).text().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            $(this).html(temp);
        })
    });
</script>