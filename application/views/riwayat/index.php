<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Riwayat Pembayaran</h1>
</div>

<link rel="stylesheet" href="<?= base_url('assets/dataTables/datatables.min.css') ?>">

<!-- CONTENT GOES HERE -->
<div class="card shadow">
    <div class="card-body">
        <table id="tabel-riwayat" class="table-hover table-striped table-responsive-md">
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
                            <a class="badge badge-success px-2 py-1 cursor-pointer" onclick="showDetail(<?= $dataRiwayat[$i]['id_pembayaran'] ?>)"><i class="fas fa-info text-white"></i></a>
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