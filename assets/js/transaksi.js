function searchSiswa(){
    let value = $('#search-siswa').val();
    $.ajax({
        type: 'GET',
        url: 'http://localhost/UKK2/transaksi/getDataSiswa/' + value,
        async: true,
        dataType: 'json',
        success: function (data) {
            if (data.length) {
                $('#tabel-siswa tbody').empty();
                for (let i = 0; i < data.length; i++) {
                    $('#tabel-siswa tbody').append('<tr><td><span data_id="'+data[i]['id_siswa']+'" onclick=setSpp('+data[i]['id_siswa']+') class="btn-set-spp badge badge-primary cursor-pointer">Pilih</span></td><td>'+data[i]['nisn']+'</td><td>'+data[i]['nama']+'</td><td>'+data[i]['kelas_full']+'</td></tr>');
                }
            } else {
                $('#tabel-siswa tbody').empty();
                $('#tabel-siswa tbody').append('<tr><td colspan="4" class="dataTables_empty">Data Tidak Ditemukan</td></tr>');
            }
        }
    });
}

// Set event for search button
$('#btn-search').on('click',function() {
    searchSiswa();
});

// Set event for enter key when search
$("#search-siswa").keyup(function(event) {
    if (event.keyCode === 13) {
        searchSiswa();
        $("#search-siswa").blur();
    }
});

$('#modal-search').on('shown.bs.modal', function (event) {
    $("#search-siswa").focus();
});

function setSpp(id) {    
    $.ajax({
        type: 'GET',
        url: 'http://localhost/UKK2/transaksi/getDataSpp/' + id,
        async: true,
        dataType: 'json',
        success: function (data) {
            console.log(data);
            // $('#tabel-spp tbody').empty();
            // $('#tabel-spp .dataTables_empty').hide();
            // for (let i = 0; i < data.length; i++) {
            //     $('#tabel-spp tbody').append('<tr><td><span data_id="'+data[i]['id']+'" class="badge badge-primary cursor-pointer">Pilih</span></td><td>'+data[i]['kode_spp']+'</td><td>'+data[i]['keterangan']+'</td><td>'+data[i]['nominal']+'</td></tr>');
            // }
        }
    });
}