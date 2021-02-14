<div class="main-content-container container-fluid px-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
        <span class="text-uppercase page-subtitle">Admin</span>
        <h3 class="page-title">Tambah Data SPP</h3>
        </div>
    </div>
    <!-- End Page Header -->

    <!-- CONTENT GOES HERE -->
    <div class="row">
        <div class="col-12 col-lg-10 offset-lg-1">
            <div class="card">
                <div class="card-header">
                    <h6 class="text-secondary">Kode SPP : <span class="text-dark"><?= $kodeSpp ?></span></h6>
                </div>
                <?php echo form_open('spp/createData'); ?>
                    <div class="card-body row pt-0">
                        <div class="col-5">
                            <div class="form-group">
                                <label for="keterangan_spp">Keterangan SPP</label>
                                <input type="text" class="form-control <?= (form_error('keterangan_spp')) ? 'is-invalid' : '' ?>" id="" placeholder="" name="keterangan_spp" maxlength="8" required>
                                <?php if (form_error('keterangan_spp')) : ?>
                                    <div class="invalid-feedback">
                                        <?= form_error('keterangan_spp') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="tahun">Tahun</label>
                                <input type="text" class="form-control <?= (form_error('tahun')) ? 'is-invalid' : '' ?>" id="tahun" placeholder="" name="tahun" required readonly>
                                <?php if (form_error('tahun')) : ?>
                                    <div class="invalid-feedback">
                                        <?= form_error('tahun') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="form-group">
                                <label for="nominal">Nominal (Rp)</label>
                                <input type="text" class="form-control <?= (form_error('nominal')) ? 'is-invalid' : '' ?>" id="nominal" placeholder="" name="nominal" required>
                                <?php if (form_error('nominal')) : ?>
                                    <div class="invalid-feedback">
                                        <?= form_error('nominal') ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <input type="text" name="data_created" id="data_created" hidden>
                        <input type="text" name="kode_spp" id="kode_spp" value="<?= $kodeSpp ?>" hidden>

                        <!-- DUAL DATA LIST BOX -->
                        <div class="col-12">
                            <div class="form-group w-100">
                                <label for="pilih_kelas">Pilih Kelas</label>
                                <div class="row">
                                    <div class="col-5">
                                        <select name="from[]" id="search" class="form-control" size="8" multiple="multiple">
                                            <?php for ($i=0; $i < count($dataKelas); $i++) { ?>
                                                <option value="<?= $dataKelas[$i]['id_kelas'] ?>"><?= $dataKelas[$i]['kelas'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    
                                    <div class="col-2 pt-3">
                                        <button type="button" id="search_rightAll" class="btn btn-block btn-secondary"><i class="fas fa-forward"></i></button>
                                        <button type="button" id="search_rightSelected" class="btn btn-block btn-secondary"><i class="fas fa-chevron-right"></i></button>
                                        <button type="button" id="search_leftSelected" class="btn btn-block btn-secondary"><i class="fas fa-chevron-left"></i></button>
                                        <button type="button" id="search_leftAll" class="btn btn-block btn-secondary"><i class="fas fa-backward"></i></button>
                                    </div>
                                    
                                    <div class="col-5">
                                        <select name="to[]" id="search_to" class="form-control" size="8" multiple="multiple"></select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block mt-5">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="<?= base_url('assets/multiselect/dist/js/multiselect.min.js') ?>"></script>
    <script src="<?= base_url('assets/cleave/dist/cleave.min.js') ?>"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('#search').multiselect({
                search: {
                    left: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                    right: '<input type="text" name="q" class="form-control" placeholder="Search..." />',
                },
                fireSearch: function(value) {
                    return value.length > 3;
                }
            });
        });
        </script>
    <script>
        $(document).ready( function () {
            let d = new Date(),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();

            if (month.length < 2) 
                month = '0' + month;
            if (day.length < 2) 
                day = '0' + day;

            $('#tahun').val(year);
            d = [year, month, day].join('-');
            $('#data_created').val(d);
        } );

        var cleave = new Cleave('#nominal', {
            numeral: true,
            numeralThousandsGroupStyle: 'thousand'
        });
    </script>
</div>