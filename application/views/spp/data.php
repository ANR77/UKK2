<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data SPP</h1>
    <a href="<?= base_url('spp/create') ?>" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-plus fa-sm"></i> Tambah Data</a>
</div>

<!-- CONTENT GOES HERE -->
<link rel="stylesheet" href="<?= base_url('assets/dataTables/datatables.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/toastr/build/toastr.min.css') ?>">
<div class="card p-3 shadow-none mb-5">
    <table id="tabel-spp" class="table-hover table-striped table-responsive-md">
        <thead>
            <tr>
                <th>No</th>
                <th>Keterangan</th>
                <th>Tahun</th>
                <th>Tingkat</th>
                <th>Jumlah Angsuran</th>
                <th>Nominal Angsuran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i=0; $i < count($dataSpp); $i++) { ?>
                <tr>
                    <td><?= $i+1 ?></td>
                    <td><?= $dataSpp[$i]['keterangan'] ?></td>
                    <td><?= $dataSpp[$i]['tahun'] ?></td>
                    <td><?= $dataSpp[$i]['tingkat'] ?></td>
                    <td class="nominal"><?= $dataSpp[$i]['jumlah_angsuran'] ?></td>
                    <td class="nominal"><?= $dataSpp[$i]['nominal_angsuran'] ?></td>
                    <td>
                        <a class="badge badge-success p-1" href="<?= base_url('spp/edit/'.$dataSpp[$i]['id_spp']) ?>"><i class="fas fa-edit"></i> Edit</a>
                        <a class="badge badge-secondary p-1" href="<?= base_url('spp/laporan/'.$dataSpp[$i]['id_spp']) ?>"><i class="fas fa-file-alt"></i> Laporan</a>
                        <a class="badge badge-danger p-1 text-white cursor-pointer" data-id="<?= $dataSpp[$i]['id_spp'] ?>" data-toggle="modal" data-target="#modalDelete"><i class="fas fa-trash-alt"></i> Hapus</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>


<script src="<?= base_url('assets/dataTables/datatables.min.js') ?>"></script>
<script src="<?= base_url('assets/toastr/build/toastr.min.js') ?>"></script>
<!-- Modal -->
<div class="modal fade" id="modalDelete" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content p-2">
            <div class="modal-header border-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <h5>Apakah anda yakin untuk menghapus data?</h5>
                <small>Data pembayaran, riwayat, dan SPP akan dihapus</small>
            </div>
            <div class="modal-footer row border-0">
                <div class="col">
                    <a id="btn-modal-delete" type="button" class="btn btn-danger btn-block">Iya</a>
                </div>
                <div class="col">
                    <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready( function () {
        $('#tabel-spp').DataTable();
        $('.nominal').each(function() {
            let temp = "Rp. "+$(this).text().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            $(this).html(temp);
        })
    });

    $('#modalDelete').on('shown.bs.modal', function (event) {
        let id = $(event.relatedTarget).data('id');
        let path = "<?= base_url("spp/delete/") ?>"+id;
        $('#btn-modal-delete').attr('href', path);
    });

    <?php 
        if ($this->session->flashdata('status') == 'success') {
            echo 'toastr.success("'.$this->session->flashdata('pesan').'")';
        } elseif ($this->session->flashdata('status') == 'fail') {
            echo 'toastr.error("'.$this->session->flashdata('pesan').'")';
        }
    ?>
</script>