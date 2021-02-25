<div class="main-content-container container-fluid px-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Admin</span>
            <h3 class="page-title">Data Kelas</h3>
        </div>
        <div class="col-12 col-sm-8 d-flex justify-content-end">
            <div class="flex flex-row justify-content-end">
                <a href="<?= base_url('kelas/create') ?>" class="btn btn-primary mr-0 mt-3 mt-sm-0"><i class="fas fa-plus mr-2"></i>Tambah Data</a>
            </div>
        </div>
    </div>
    <!-- End Page Header -->

    <!-- CONTENT GOES HERE -->
    <link rel="stylesheet" href="<?= base_url('assets/dataTables/datatables.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/toastr/build/toastr.min.css') ?>">
    <div class="card p-3 shadow-none">
        <table id="tabel-kelas" class=" table-hover table-striped">
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
                            <a class="btn btn-primary p-1" href="<?= base_url('kelas/edit/'.$dataKelas[$i]['id_kelas']) ?>"><i class="fas fa-edit"></i></a>
                            <a class="btn btn-danger p-1" data-id="<?= $dataKelas[$i]['id_kelas'] ?>" data-toggle="modal" data-target="#modalDelete"><i class="fas fa-trash-alt"></i></a>
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
            <div class="modal-content">
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
            $('#tabel-kelas').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            } );
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
            let path = "<?= base_url("kelas/delete/") ?>"+id;
            $('#btn-modal-delete').attr('href', path);
        });

        <?php 
            if ($this->session->flashdata('msg') == 'success') {
                echo 'toastr.success("Perintah Berhasil Dilakukan")';
            } elseif ($this->session->flashdata('msg') == 'fail') {
                echo 'toastr.warning("Peintah Gagal Dilakukan")';
            }
        ?>
    </script>
    
</div>