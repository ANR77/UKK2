<div id="div-parent" class="main-content-container container-fluid p-4">
    <!-- Page Header -->
    <!-- <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
        <span class="text-uppercase page-subtitle"><?= $this->session->level ?></span>
        <h3 class="page-title">Transaksi</h3>
        </div>
    </div> -->
    <!-- End Page Header -->

    <link rel="stylesheet" href="<?= base_url('assets/dataTables/datatables.min.css') ?>">

    <!-- CONTENT GOES HERE -->
    <div class="row h-100">
        <!-- TABLE SELECT SISWA -->
        <div class="col-12">
            <div id="card-siswa" class="card p-4">
                <div class="card-header p-0">
                    <input type="text" name="search-siswa" id="search-siswa">
                </div>
                <div class="card-body overflow-auto position-relative p-0">
                    <table id="tabel-siswa" class="table-hover table-striped position-relative">
                        <thead>
                            <tr>
                                <th>Aksi</th>
                                <th>NISN</th>
                                <th>Nama Siswa</th>
                                <th>Kelas</th>
                            </tr>
                        </thead>
                        <tbody id="tabel-siswa-body">
                            <?php for ($i=0; $i < count($dataSiswa); $i++) { ?>
                                <tr>
                                    <td><span data-id="<?= $dataSiswa[$i]['id_siswa'] ?>" class="badge badge-primary cursor-pointer btn-pilih-siswa">Pilih</span></td>
                                    <td><?= $dataSiswa[$i]['nisn'] ?></td>
                                    <td><?= $dataSiswa[$i]['nama'] ?></td>
                                    <td><?= $dataSiswa[$i]['kelas_full'] ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr class="odd">
                                <td valign="top" colspan="4" class="dataTables_empty">Silahkan cari data siswa melalui search box</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <!-- TABEL SELECT TAGIHAN -->
        <div class="col-12 col-lg-6">
            <div class="col-12 p-0">
                <div class="card">
                    <div class="card-body">
                        <table id="tabel-spp" class="table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Aksi</th>
                                    <th>Kode</th>
                                    <th>Keterangan</th>
                                    <th>Nominal</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <!-- <tr>
                                        <td><span data_id="1" class="badge badge-primary">Pilih</span></td>
                                        <td>kode</td>
                                        <td>keterangan</td>
                                        <td>nominal</td>
                                    </tr> -->
                            </tbody>
                            <!-- <tfoot>
                                <tr class="odd">
                                    <td valign="top" colspan="4" class="dataTables_empty">Silahkan cari data siswa melalui search box</td>
                                </tr>
                            </tfoot> -->
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- PEMBAYARAN -->
        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url('assets/dataTables/datatables.min.js') ?>"></script>

    <script>
        $(document).ready( function () {
            $('#card-siswa').height($('#div-parent').outerHeight()/100*30);

            let tabelSiswa = $('#tabel-siswa').DataTable({
                dom: 't',
                "paging": false
            });
            // $('#tabel-siswa-body').css('height',$('#card-siswa').height()-$('#card-siswa .card-header').height()-$('#tabel-spp thead').height());

            $('#tabel-siswa tbody').hide();
            $('#search-siswa').keyup(function() {
                if (this.value != "") {
                    $('#tabel-siswa tfoot').hide();
                    $('#tabel-siswa tbody').show();
                    tabelSiswa.search(this.value).draw();
                } else {
                    $('#tabel-siswa tfoot').show();
                    $('#tabel-siswa tbody').hide();
                }
            });

            $('#tabel-spp').DataTable({
                "pageLength": 3,
                dom: 't',
            });
        });
    </script>

    <script src="<?= base_url('assets/js/transaksi.js') ?>"></script>
</div>