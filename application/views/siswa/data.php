<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Siswa</h1>
    <a href="<?= base_url('siswa/create') ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm"></i> Tambah Data</a>
</div>

<!-- CONTENT GOES HERE -->
<link rel="stylesheet" href="<?= base_url('assets/dataTables/datatables.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/toastr/build/toastr.min.css') ?>">
<div class="card p-3 shadow-none">
    <table id="tabel-kelas" class="table-hover table-striped table-responsive-md">
        <thead>
            <tr>
                <th>No</th>
                <th>NISN</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Alamat</th>
                <th>No. Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i=0; $i < count($dataSiswa); $i++) { ?>
                <tr>
                    <td><?= $i+1 ?></td>
                    <td><?= $dataSiswa[$i]['nisn'] ?></td>
                    <td><?= $dataSiswa[$i]['nis'] ?></td>
                    <td><?= $dataSiswa[$i]['nama'] ?></td>
                    <td class="kelas"><?= $dataSiswa[$i]['kelas'] ?></td>
                    <td class="alamat"><?= $dataSiswa[$i]['alamat'] ?></td>
                    <td><?= $dataSiswa[$i]['no_telp'] ?></td>
                    <td>
                        <a class="badge badge-success p-1" href="<?= base_url('Siswa/edit/'.$dataSiswa[$i]['nisn']) ?>"><i class="fas fa-edit"></i></a>
                        <a class="badge badge-danger text-white p-1 cursor-pointer" data-id="<?= $dataSiswa[$i]['id_siswa'] ?>" data-toggle="modal" data-target="#modalDelete"><i class="fas fa-trash-alt"></i></a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr>
                <th>No</th>
                <th>NISN</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Siswa</th>
                <th>Alamat</th>
                <th>No. Telepon</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
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
        toastr.options = {
            'closeButton': true,
            'debug': false,
            'newestOnTop': false,
            'progressBar': true,
            'positionClass': 'toast-top-right',
            'preventDuplicates': false,
            'showDuration': '1000',
            'hideDuration': '1000',
            'timeOut': '5000',
            'extendedTimeOut': '1000',
            'showEasing': 'swing',
            'hideEasing': 'linear',
            'showMethod': 'fadeIn',
            'hideMethod': 'fadeOut',
        }
    } );

    $('#modalDelete').on('shown.bs.modal', function (event) {
        let id = $(event.relatedTarget).data('id');
        let path = "<?= base_url("siswa/delete/") ?>"+id;
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