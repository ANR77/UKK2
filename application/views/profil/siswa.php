<div class="main-content-container container-fluid px-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
        <span class="text-uppercase page-subtitle">Siswa</span>
        <h3 class="page-title">Profil</h3>
        </div>
    </div>
    <!-- End Page Header -->

    <link rel="stylesheet" href="<?= base_url('assets/toastr/build/toastr.min.css') ?>">

    <!-- CONTENT GOES HERE -->
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="nisn">NISN</label>
                        <input type="text" class="form-control" id="nisn" value="<?= $dataSiswa['nisn'] ?>" readonly>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="nis">NIS</label>
                        <input type="text" class="form-control" id="nis" value="<?= $dataSiswa['nis'] ?>" readonly>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="nama_siswa">Nama Siswa</label>
                        <input type="text" class="form-control" id="nama_siswa" value="<?= $dataSiswa['nama'] ?>" readonly>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <input type="text" class="form-control" id="kelas" value="<?= $dataSiswa['kelas_full'] ?>" readonly>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" value="<?= $dataSiswa['alamat'] ?>" readonly>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="no_telp">No. Telepon</label>
                        <input type="text" class="form-control" id="no_telp" value="<?= $dataSiswa['no_telp'] ?>" readonly>
                    </div>
                </div>
                <div class="col-6">
                    <div id="ubah-password" class="form-group">
                        <label for="password">Password</label>
                        <button type="button" id="btn-ubahPass" class="btn btn-success d-block btn-sm" onclick="btnUbahPassword(<?= $dataSiswa['id_siswa'] ?>)">Ubah Password</button>
                    </div>
                </div>
            </div>

            <h6 class="mt-3">Daftar SPP</h6>
            <div class="row">
                <?php for ($i=0; $i < count($dataSpp); $i++) { ?>
                    <div class="col-6">
                        <div class="accordion" id="accordionExample">
                            <div class="card shadow-sm border">
                                <div class="card-header p-0 border-bottom" id="headingOne">
                                    <button class="btn btn-block d-flex justify-content-between" type="button" data-toggle="collapse" data-target="#spp<?= $i?>" aria-expanded="true" aria-controls="collapseOne"><h6 class="m-0"><span class="text-truncate" style="max-width: 50px;"><?= $dataSpp[$i]['keterangan'] ?></span> | <span><?= $dataSpp[$i]['tingkat'] ?></span> | <span>Rp. <?= $dataSpp[$i]['nominal_angsuran'] ?></span></h6><?= ($dataSpp[$i]['angsuran'] == count($bulan)) ? '<div class="badge badge-success align-self-end">Lunas</div>' : '<div class="badge badge-danger align-self-end">Belum</div>' ; ?></button>
                                </div>
                                <div id="spp<?= $i?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body px-0 pt-1 pb-2 row">
                                        <div class="col-6">
                                            <?php for ($j=0; $j < 6; $j++) { ?>
                                                <div class="btn btn-block d-flex justify-content-between pt-1 pb-0" ><h6 class="m-0"><?= $bulan[$j] ?></h6><?= ($j < $dataSpp[$i]['angsuran']) ? '<div class="badge badge-success align-self-end">Lunas</div>' : '<div class="badge badge-danger align-self-end">Belum</div>' ; ?></div>
                                            <?php } ?>
                                        </div>
                                        <div class="col-6">
                                            <?php for ($j=6; $j < 12; $j++) { ?>
                                                <div class="btn btn-block d-flex justify-content-between pt-1 pb-0" ><h6 class="m-0"><?= $bulan[$j] ?></h6><?= ($j < $dataSpp[$i]['angsuran']) ? '<div class="badge badge-success align-self-end">Lunas</div>' : '<div class="badge badge-danger align-self-end">Belum</div>' ; ?></div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>                
            </div>
        </div>
    </div>

</div>

<script src="<?= base_url('assets/toastr/build/toastr.min.js') ?>"></script>
<script src="<?= base_url('assets/js/profilSiswa.js') ?>"></script>
<script>
    <?php 
        if ($this->session->flashdata('status') == 'success') {
            echo 'toastr.success("'.$this->session->flashdata('pesan').'")';
        } elseif ($this->session->flashdata('status') == 'fail') {
            echo 'toastr.error("'.$this->session->flashdata('pesan').'")';
        }
    ?>
</script>