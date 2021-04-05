<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-start mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<!-- Content Row -->
<div class="row">
    <!-- Transaksi Hari Ini -->
    <div class="col-xl-3 col-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Transaksi Hari ini</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($dataTransaksi) ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-receipt fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Jumlah Siswa -->
    <div class="col-xl-3 col-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Jumlah Siswa</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlahSiswa ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-graduate fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Jumlah Kelas -->
    <div class="col-xl-3 col-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Jumlah Kelas</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlahKelas ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-school fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Jumlah Petugas -->
    <div class="col-xl-3 col-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Jumlah Petugas</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlahPetugas ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-tie fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<link rel="stylesheet" href="<?= base_url('assets/dataTables/datatables.min.css') ?>">

<div class="row mb-5">
    <div class="col-12">     
        <div class="card shadow">
            <div class="card-header pb-0 bg-white px-4 pt-2 border-0 d-flex flex-row justify-content-between">
                <h4 class="mt-2">Transaksi hari ini</h4>
                <a href="<?= base_url('riwayat') ?>" class="cursor-pointer mt-1 text-secondary"><i class="fas fa-external-link-alt fa-sm"></i></a>
            </div>
            <div class="card-body px-4 pb-4 pt-0">
                <table id="tabel-transaksi" class="table-hover table-striped table-responsive-md">
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
                                    <a class="badge badge-success text-white cursor-pointer px-2 py-1" onclick="showDetail(<?= $dataTransaksi[$i]['id_pembayaran'] ?>)"><i class="fas fa-info"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modalDetail" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content p-2">
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