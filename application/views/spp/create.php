<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-start mb-5">
    <a href="<?= base_url('spp') ?>" class="btn-back"><i class="fas fa-arrow-circle-left text-success mr-2"></i></a>
    <h1 class="h3 mb-0 text-gray-800">Tambah Data SPP</h1>
</div>

<link rel="stylesheet" href="<?= base_url('assets/select2/dist/css/select2.bootstrap4.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/select2/dist/css/select2.min.css') ?>">

<!-- CONTENT GOES HERE -->
<div class="row">
    <div class="col-12 col-lg-10 offset-lg-1">
        <div class="card shadow">
            <?php echo form_open('spp/createData'); ?>
                <div class="card-body row">
                    <div class="col-6">
                        <div class="row">
                            <!-- KETERANGAN -->
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="keterangan_spp">Keterangan SPP</label>
                                    <input type="text" class="form-control <?= (form_error('keterangan_spp')) ? 'is-invalid' : '' ?>" name="keterangan_spp" required>
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
                                    <input id="tahun" class="form-control" name="tahun" value="<?= $tgl ?>" readonly>
                                </div>
                            </div>
                            <!-- SELECT TINGKAT -->
                            <div class="col-8">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="semua-tingkat">
                                    <label class="custom-control-label mb-2" for="semua-tingkat">Semua Tingkat</label>
                                </div>
                                <div class="form-group">
                                    <select id="select-tingkat-hook" class="custom-select" name="tingkat-hook[]" multiple="multiple">
                                        <?php for ($i=0; $i < count($dataTingkat); $i++) { ?>
                                            <option value="<?= $dataTingkat[$i]['tingkat_kelas'] ?>"><?= $dataTingkat[$i]['tingkat_kelas'] ?></option>
                                        <?php } ?>
                                    </select>
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
                                    <input id="nominal-angsuran" type="text" class="form-control nominal" id="" placeholder="" name="nominal_angsuran" required>
                                </div>
                            </div>
                            <!-- JUMLAH ANGSURAN -->
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="nominal">Jumlah Angsuran (Rp)</label>
                                    <input type="text" class="form-control nominal <?= (form_error('nominal')) ? 'is-invalid' : '' ?>" id="nominal" name="jumlah_angsuran" readonly>
                                    <small id="emailHelp" class="form-text text-muted">* Total angsuran selama 12 bulan</small>
                                    <?php if (form_error('nominal')) : ?>
                                        <div class="invalid-feedback">
                                            <?= form_error('nominal') ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="text" name="data_created" id="data_created" value="<?= $tgl_full ?>" hidden>
                    <select id="select-tingkat" name="tingkat[]" multiple="multiple" hidden>
                        <?php for ($i=0; $i < count($dataTingkat); $i++) { ?>
                            <option value="<?= $dataTingkat[$i]['tingkat_kelas'] ?>"><?= $dataTingkat[$i]['tingkat_kelas'] ?></option>
                        <?php } ?></select>
                    <div class="col-12">
                        <button type="submit" class="btn btn-success btn-block mt-5">Simpan</button>
                    </div>      
                </div>
            </form>
        </div>
    </div>
</div>
<script src="<?= base_url('assets/select2/dist/js/select2.min.js') ?>"></script>
<script src="<?= base_url('assets/cleave/dist/cleave.min.js') ?>"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $('#select-tingkat-hook').select2({
            // theme: 'bootstrap4' 
        });
        setDate();
        $('.nominal').toArray().forEach(function(field){
            new Cleave(field, {
            numeral: true,
            numeralThousandsGroupStyle: 'thousand'
            })
        });
        // $('#nominal').keyup(function() {
        //     $('#nominal-angsuran').val(toThousand($(this).val().split(",").join("")/12))
        // });
        $('#nominal-angsuran').keyup(function() {
            $('#nominal').val(toThousand($(this).val().split(",").join("")*12))
        });

        $("#semua-tingkat").click(function(){
            if($("#semua-tingkat").is(':checked') ){
                $("#select-tingkat-hook > option").prop("selected","selected");
                $("#select-tingkat-hook").trigger("change");// Trigger change to select 2
                $("#select-tingkat-hook").prop('disabled', true);
            }else{
                $("#select-tingkat-hook").prop('disabled', false);
            }
        });

        $("#select-tingkat-hook").change(function() {
            $('#select-tingkat').val($(this).val());
            console.log($('#select-tingkat').val());
        })
    });

    function toThousand(num){
        var num_parts = num.toString().split(".");
        num_parts[0] = num_parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        return num_parts.join(".");
    }
</script>