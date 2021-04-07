function btnUbahPassword() {
    $("#btn-ubahPass").removeClass('d-block');
    $("#btn-ubahPass").addClass('d-none');
    $('#ubah-password').append('<div id="verif-password" class="d-flex"><input type="password" class="form-control mr-1" id="password" placeholder="Masukkan password baru" name="password" maxlength="32"><button id="" class="btn btn-secondary mx-1 btn-sm" onclick="batal()">Batal</button></div>');
    $('#password').focus();
}

function batal(){
    $('#verif-password').remove();
    $("#btn-ubahPass").removeClass('d-none');
    $("#btn-ubahPass").addClass('d-block');
}