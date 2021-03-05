<div class="main-content-container container-fluid px-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Admin</span>
            <h3 class="page-title">Data SPP</h3>
        </div>
        <div class="col-12 col-sm-8 d-flex justify-content-end">
            <div class="flex flex-row justify-content-end">
                <a href="<?= base_url('spp/create') ?>" class="btn btn-primary mr-0 mt-3 mt-sm-0"><i class="fas fa-plus mr-2"></i>Tambah Data</a>
            </div>
        </div>
    </div>
    <!-- End Page Header -->

    <!-- CONTENT GOES HERE -->
    <link rel="stylesheet" href="<?= base_url('assets/dataTables/datatables.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/toastr/build/toastr.min.css') ?>">
    <div class="card p-3 shadow-none">
        <table id="tabel-spp" class="table-hover table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Keterangan</th>
                    <th>Tahun</th>
                    <th>Tingkat</th>
                    <th>Jumlah Angsuran</th>
                    <th>Nominal Angsuran</th>
                    <!-- <th>Aksi</th> -->
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
                        <!-- <td>
                            <a class="btn btn-primary p-1" href="<?= base_url('spp/edit/'.$dataSpp[$i]['nisn']) ?>"><i class="fas fa-edit"></i></a>
                            <a class="btn btn-danger p-1" data-id="<?= $dataSpp[$i]['nisn'] ?>" data-toggle="modal" data-target="#modalDelete"><i class="fas fa-trash-alt"></i></a>
                        </td> -->
                    </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <!-- <th>No</th>
                    <th>NISN</th>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Siswa</th>
                    <th>Alamat</th>
                    <th>No. Telepon</th> -->
                    <!-- <th>Aksi</th> -->
                </tr>
            </tfoot>
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
            $('#tabel-spp').DataTable();
            $('.nominal').each(function() {
                let temp = "Rp. "+$(this).text().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                $(this).html(temp);
            })
        });

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
    
</div>