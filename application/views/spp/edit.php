<div class="main-content-container container-fluid px-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
        <span class="text-uppercase page-subtitle">Admin</span>
        <h3 class="page-title">Edit Data SPP</h3>
        </div>
    </div>
    <!-- End Page Header -->

    <!-- CONTENT GOES HERE -->
    <div class="row">
        <div class="col-12 col-lg-10 offset-lg-1">
            <div class="card">
                <?php echo form_open('spp/editData/'.$dataSpp['id_spp']); ?>
                    <div class="card-body row">
                        <div class="col-6">
                            <div class="row">
                                <!-- KETERANGAN -->
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="keterangan_spp">Keterangan SPP</label>
                                        <input type="text" class="form-control <?= (form_error('keterangan_spp')) ? 'is-invalid' : '' ?>" name="keterangan" value="<?= $dataSpp['keterangan'] ?>" required>
                                        <?php if (form_error('keterangan_spp')) : ?>
                                            <div class="invalid-feedback">
                                                <?= form_error('keterangan_spp') ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <!-- SELECT TAHUN -->
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="tahun">Tahun</label>
                                        <input id="tahun" class="custom-select" name="tahun" disabled value="<?= $dataSpp['tahun'] ?>"></input>
                                    </div>
                                </div>
                                <!-- SELECT TINGKAT -->
                                <div class="col-8">
                                    <div class="form-group">
                                        <label for="tingkat">Tingkat</label>
                                        <input id="tingkat" class="custom-select" name="tingkat" disabled value="<?= $dataSpp['tingkat'] ?>"></input>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- NOMINAL ANGSURAN -->
                        <div class="col-6">
                            <div class="row">
                                <!--NOMINAL ANGSURAN -->
                                <div class="col-12">
                                    <div class="form-group w-100">
                                        <label for="nominal_angsuran">Nominal Angsuran(Rp)</label>
                                        <input id="nominal-angsuran" type="text" class="form-control nominal" id="" placeholder="" name="nominal_angsuran" disabled value="<?= $dataSpp['nominal_angsuran'] ?>">
                                    </div>
                                </div>
                                <!-- JUMLAH ANGSURAN -->
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="nominal">Jumlah Angsuran (Rp)</label>
                                        <input type="text" class="form-control nominal <?= (form_error('nominal')) ? 'is-invalid' : '' ?>" id="nominal" name="jumlah_angsuran" disabled value="<?= $dataSpp['jumlah_angsuran'] ?>">
                                        <small id="emailHelp" class="form-text text-muted">* Total angsuran selama 12 bulan</small>
                                    </div>
                                </div>
                            </div>
                        </div>              
                        <button type="submit" class="btn btn-success btn-block mt-5">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="<?= base_url('assets/select2/dist/js/select2.min.js') ?>"></script>
    <script src="<?= base_url('assets/cleave/dist/cleave.min.js') ?>"></script>
    <script type="text/javascript">
        function toThousand(num){
            var num_parts = num.toString().split(".");
            num_parts[0] = num_parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            return num_parts.join(".");
        }
    </script>
</div>