// SEARCH SISWA
function showDetail(id){
    $.ajax({
        type: 'GET',
        url: 'http://localhost/UKK2/riwayat/getDetail/' + id,
        async: true,
        dataType: 'json',
        success: function (data) {
            console.log(data);
            $('#tgl-bayar').html(data[0]['tgl_bayar']);
            $('#nisn').val(data[0]['nisn']);
            $('#nama-siswa').val(data[0]['nama']);
            $('#kelas').val(data[0]['kelas_full']);
            $('#bulan').val(data[0]['bulan']);
            $('#nama-petugas').val(data[0]['nama_petugas']);
            $('#jumlah-bayar').val('Rp. '+toThousand(data[0]['jumlah_bayar']));
            $('#kembalian').val('Rp. '+toThousand(data[0]['kembalian']));
            $('#modalDetail').modal('show');
        }
    });
}

// PLAIN TO THOUSAND SEPARATOR
function toThousand(num){
    var num_parts = num.toString().split(".");
    num_parts[0] = num_parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return num_parts.join(".");
}