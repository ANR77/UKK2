$('.btn-pilih-siswa').on('click', function () {
    var id = $(this).data('id');
    
    $.ajax({
        type: 'GET',
        url: 'http://localhost/UKK2/transaksi/getDataSpp/' + id,
        async: true,
        dataType: 'json',
        success: function (data) {
            $('#tabel-spp tbody').empty();
            $('#tabel-spp .dataTables_empty').hide();
            for (let i = 0; i < data.length; i++) {
                $('#tabel-spp tbody').append('<tr><td><span data_id="'+data[i]['id']+'" class="badge badge-primary cursor-pointer">Pilih</span></td><td>'+data[i]['kode_spp']+'</td><td>'+data[i]['keterangan']+'</td><td>'+data[i]['nominal']+'</td></tr>');
            }
        }
    });
});