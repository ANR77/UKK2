<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div class="col-4">
        <h1 class="h3 mb-0 text-gray-800">Laporan SPP</h1>
    </div>
    <div class="col-3 d-flex justify-content-end">
        <a id="generate-laporan" href="" class="btn btn-success btn-sm mt-3 mr-2"><i class="fas fa-file-download mr-2"></i>Generate Laporan</a>
    </div>
    <div class="col-5">
        <div class="input-group mt-3">
            <div class="input-group-prepend">
                <label class="input-group-text" for="select-kelas"><strong>Pilih Kelas</strong></label>
            </div>
            <select class="custom-select" id="select-kelas">
                <option selected>- Silahkan Pilih -</option>
                <?php foreach ($dataKelas as $kelas) { ?>
                    <option value="<?= $kelas['id_kelas'] ?>"><?= $kelas['kelas_full'] ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
</div>

<link rel="stylesheet" href="<?= base_url('assets/dataTables/datatables.min.css') ?>">

<!-- CONTENT GOES HERE -->
<div class="card p-3 shadow-none mb-5">
    <table id="tabel-laporan" class="table-hover table-bordered table-sm table-responsive-md">
        <thead>
            <tr>
                <th>No</th>
                <th>NISN</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Jumlah Tagihan</th>
                <th>Jumlah Terbayar</th>
                <th>Jumlah Tanggungan</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>
<input type="hidden" id="id-spp" value="<?= $idSpp ?>">

<script src="<?= base_url('assets/dataTables/datatables.min.js') ?>"></script>
<script src="<?= base_url('assets/toastr/build/toastr.min.js') ?>"></script>
<script src="<?= base_url('assets/js/laporan.js') ?>"></script>
