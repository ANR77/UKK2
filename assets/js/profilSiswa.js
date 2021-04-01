function btnUbahPassword(id_siswa) {
    $("#btn-ubahPass").removeClass('d-block');
    $("#btn-ubahPass").addClass('d-none');
    $('#ubah-password').append('<div id="verif-password" class="d-flex"><input type="password" class="form-control mr-1" id="password" placeholder="Masukkan password lama""><button  id="btn-submit" class="btn btn-success mx-1 btn-sm" onclick="verifikasi('+id_siswa+')">Submit</button><button id="" class="btn btn-secondary mx-1 btn-sm" onclick="batal()">Batal</button></div><small id="pass-salah" class="text-danger d-none mt-1"><i class="fas fa-exclamation-circle mr-1"></i> Password Salah</small>');
    $('#password').focus();
}

function batal(){
    $('#verif-password').remove();
    $("#btn-ubahPass").removeClass('d-none');
    $("#btn-ubahPass").addClass('d-block');
}

function verifikasi(id_siswa) {
    let value = $('#password').val();
    $.ajax({
        type: 'GET',
        url: 'http://localhost/UKK2/profil/cekPasswordSiswa/' + id_siswa +'/'+value,
        async: true,
        dataType: 'json',
        success: function (data) {
            if (data) {
                $('#password').removeClass('border-danger text-danger');
                $('#pass-salah').addClass('d-none').removeClass('d-block');
                $('#password').val("").attr('placeholder','Masukkan Password Baru').focus();
                $('#btn-submit').attr('onclick','ubahPassword('+data['id_siswa']+')').html('Simpan');
            } else {
                $('#password').addClass('border-danger text-danger').focus();
                $('#pass-salah').addClass('d-block').removeClass('d-none');
            }
        }
    });
}

function ubahPassword(id_siswa) {
    let value = $('#password').val();
    $.ajax({
        type: 'GET',
        url: 'http://localhost/UKK2/profil/ubahPasswordSiswa/' + id_siswa +'/'+value,
        async: true,
        dataType: 'json',
        statusCode: {
            500: function () {
                toastr.error('Ubah Password Gagal!');
                batal();
            }
        },
        success: function (data) {
            toastr.success('Ubah Password Berhasil!');
            batal();
        }
    });
}

$('.btn-ubah').mouseup(function() {
    $('#nama').prop('readonly',false);
    $('#username').prop('readonly',false);
    $('#ubah').html('<button type="submit" id="btn-ubahData" class="btn btn-secondary d-block btn-ubahData btn-sm"><i class="fas fa-save mr-2"></i> Simpan</button>');
})