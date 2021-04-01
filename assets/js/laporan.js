let tabelLaporan = $('#tabel-laporan').DataTable({
    dom: 't',
    paging: false,
    language : {
        "emptyTable": "Silahkan Pilih Kelas Terlebih Dahulu",
    },
    ordering : false
});

function toThousand(num){
    var num_parts = num.toString().split(".");
    num_parts[0] = num_parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return "Rp. "+num_parts.join(".");
}

$('#select-kelas').change(function() {
    let id_spp = $('#id-spp').val();
    let id_kelas = $('#select-kelas').val();
    $.ajax({
        type: 'GET',
        url: 'http://localhost/UKK2/spp/getLaporan/' + id_spp +'/'+id_kelas,
        async: true,
        dataType: 'json',
        success: function (data) {
            tabelLaporan.clear();
            let tagihan = 0;
            let angsuran = 0;
            let tanggungan = 0;
            for (let i = 0; i < data.length; i++) {
                tabelLaporan.row.add([
                    i+1,
                    data[i]['nisn'],
                    data[i]['nis'],
                    data[i]['nama'],
                    toThousand(data[i]['jumlah_tagihan']),
                    toThousand(data[i]['jumlah_angsuran']),
                    toThousand(data[i]['jumlah_tanggungan'])
                ]
                ).draw();
                tagihan = parseInt(tagihan) + parseInt(data[i]['jumlah_tagihan']);
                angsuran = parseInt(angsuran) + parseInt(data[i]['jumlah_angsuran']);
                tanggungan = parseInt(tanggungan) + parseInt(data[i]['jumlah_tanggungan']);
            }
            $('#tabel-laporan tbody').append('<tr><td colspan="4">Jumlah</td></td><td>'+toThousand(tagihan)+'</td><td>'+toThousand(angsuran)+'</td><td>'+toThousand(tanggungan)+'</td></tr>');
        }
    });
    $('#generate-laporan').attr('href','http://localhost/UKK2/spp/generateLaporan/'+id_spp+'/'+id_kelas);
});