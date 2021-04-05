<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Kelas</h1>
    <a href="<?= base_url('kelas/create') ?>" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-plus fa-sm"></i> Tambah Data</a>
</div>

<!-- CONTENT GOES HERE -->
<link rel="stylesheet" href="<?= base_url('assets/dataTables/datatables.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/toastr/build/toastr.min.css') ?>">
<div class="card p-3 shadow-none mb-5">
    <table id="tabel-kelas" class=" table-hover table-striped table-responsive-md">
        <thead>
            <tr>
                <th>No</th>
                <th>Kelas</th>
                <th>Jumlah Siswa</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i=0; $i < count($dataKelas); $i++) { ?>
                <tr>
                    <td><?= $i+1 ?></td>
                    <td><?= $dataKelas[$i]['kelas'] ?></td>
                    <td><?= $dataKelas[$i]['jumlah_siswa'] ?></td>
                    <td>
                        <a class="badge badge-success p-1" href="<?= base_url('kelas/edit/'.$dataKelas[$i]['id_kelas']) ?>"><i class="fas fa-edit"></i><span class="d-none d-lg-inline"> Edit</span></a>
                        <a class="badge badge-danger text-white cursor-pointer p-1" data-id="<?= $dataKelas[$i]['id_kelas'] ?>" data-toggle="modal" data-target="#modalDelete"><i class="fas fa-trash-alt"></i><span class="d-none d-lg-inline"> Hapus</span></a>
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
        $('#tabel-kelas').DataTable();
    } );

    $('#modalDelete').on('shown.bs.modal', function (event) {
        let id = $(event.relatedTarget).data('id');
        let path = "<?= base_url("kelas/delete/") ?>"+id;
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