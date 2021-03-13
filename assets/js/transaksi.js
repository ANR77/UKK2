// Inisialsasi tabelSiswa
let tabelSiswa = $('#tabel-siswa').DataTable({
    dom: 't',
    "paging": false,
    "language": {
        "emptyTable": "Silahkan cari data siswa melalui search box"
    }
});

// Inisialsasi tabelSPP
let tabelSpp = $('#tabel-spp').DataTable({
    dom: 't',
    "paging": false,
    "language": {
        "emptyTable": "Silahkan cari data siswa melalui button search siswa"
    }
});

// Inisialsasi tabelBulan
let tabelBulan = $('#tabel-bulan').DataTable({
    dom: 't',
    "paging": false,
    "language": {
        "emptyTable": "Silahkan pilih tahun dari tabel SPP"
    }
});

// Inisialsasi cleave.js
$('.nominal').toArray().forEach(function(field){
    new Cleave(field, {
    numeral: true,
    numeralThousandsGroupStyle: 'thousand'
    })
});

// SEARCH SISWA
function searchSiswa(){
    let value = $('#search-siswa').val();
    $.ajax({
        type: 'GET',
        url: 'http://localhost/UKK2/transaksi/getDataSiswa/' + value,
        async: true,
        dataType: 'json',
        success: function (data) {
            if (data.length) {
                tabelSiswa.clear();
                for (let i = 0; i < data.length; i++) {
                    tabelSiswa.row.add([
                        '<span data_id="'+data[i]['id_siswa']+'" onclick=setSpp('+data[i]['id_siswa']+') class="btn-set-spp badge badge-primary cursor-pointer">Pilih</span>',
                        data[i]['nisn'],
                        data[i]['nama'],
                        data[i]['kelas_full']
                    ]
                    ).draw();
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

// SET FOCUS INPUT SEARCH MODAL SEARCH
$('#modal-search').on('shown.bs.modal', function (event) {
    $("#search-siswa").focus();
});

// ARRAY BULAN
const bulan = [
    "Juli", 
    "Agustus", 
    "September", 
    "Oktober", 
    "November", 
    "Desember", 
    "Januari", 
    "Februari", 
    "Maret", 
    "April", 
    "Mei", 
    "Juni"
];

// DATA SPP LOKAL
let dataSpp;

// SET SPP DARI SEARCH SISWA
function setSpp(id) {
    clearAll();
    $.ajax({
        type: 'GET',
        url: 'http://localhost/UKK2/transaksi/getDataSpp/' + id,
        async: true,
        dataType: 'json',
        success: function (data) {
            dataSpp = data;
            tabelSpp.clear();
            $('#modal-search').modal('hide');
            for (let i = 0; i < data.length; i++) {
                tabelSpp.row.add([
                    '<span class="badge badge-primary cursor-pointer" onclick="toBulan('+data[i]['id_siswa_spp']+')"><i class="fas fa-plus"></i></span>',
                    data[i]['tahun'],
                    data[i]['tingkat'],
                    data[i]['keterangan']
                ]
                ).draw();
            }
        }
    });
}

// SET BULAN DARI SELECT SPP
function toBulan(id) {
    console.log(dataSpp);
    for (let i = 0; i < dataSpp.length; i++) {
        if (dataSpp[i]['id_siswa_spp']==id) {
            tabelBulan.clear();
            for (let j = 0; j < bulan.length; j++) {
                tabelBulan.row.add([
                    '<button class="btn btn-danger cursor-pointer btn-bulan" onclick="toDetail('+dataSpp[i]['id_siswa_spp']+','+j+')" disabled>Pilih</button>',
                    bulan[j],
                    dataSpp[i]['tahun'],
                    toThousand(dataSpp[i]['nominal_angsuran'])
                ]
                ).draw();
            }
            let btn = $('.btn-bulan');
            for (let k = 0; k < btn.length; k++) {
                if (k < parseInt(dataSpp[i]['angsuran'])) {
                    $(btn[k]).removeClass('btn-danger');
                    $(btn[k]).addClass('btn-success');
                } else if(k == parseInt(dataSpp[i]['angsuran'])){
                    $(btn[k]).removeClass('btn-danger');
                    $(btn[k]).addClass('btn-primary');
                    $(btn[k]).prop('disabled', false);
                }
            }
        }
    }
}

// SET DETAIL DARI SELECT BULAN
function toDetail(idSiswaSpp,indexBulan) {
    for (let i = 0; i < dataSpp.length; i++) {
        if (dataSpp[i]['id_siswa_spp']==idSiswaSpp) {
            $('#bulan').val(bulan[indexBulan]);
            $('#tahun').val(dataSpp[i]['tahun']);
            $('#tingkat').val(dataSpp[i]['tingkat']);
            $('#keterangan').val(dataSpp[i]['keterangan']);
            $('#tagihan').val(toThousand(dataSpp[i]['nominal_angsuran']));
            $('#angsuran').val(dataSpp[i]['angsuran']);
            $('#id-siswa').val(dataSpp[i]['id_siswa']);
            $('#id-spp').val(dataSpp[i]['id_spp']);
        }
    }
    $('#id-siswa-spp').val(idSiswaSpp);
    $('#tgl-bayar').val(getDate());
    $('#bayar').prop('disabled', false);
    $("#bayar").focus();
}

// LOGIC KEMBALIAN
$("#bayar").keyup(function() {
    let tagihan = parseInt($('#tagihan').val().split(',').join(""));
    let bayar = parseInt(this.value.split(',').join(""));
    if (bayar >= tagihan ) {
        $('#kembalian').val(toThousand(bayar-tagihan));
        $('#btn-bayar').prop('disabled', false);
    } else {
        $('#btn-bayar').prop('disabled', true);
        $('#kembalian').val('-');
    }
});

// RESET ALL
function clearAll() {
    tabelBulan.clear();
    $('#bulan').val('');
    $('#tahun').val('');
    $('#tingkat').val('');
    $('#keterangan').val('');
    $('#tagihan').val('-');
    $('#bayar').val('');
    $('#kembalian').val('-');
    $('#btn-bayar').prop('disabled', true);
    tabelBulan.clear().draw();
}

// GET TODAY DATE
function getDate(){
    let d = new Date(),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) 
        month = '0' + month;
    if (day.length < 2) 
        day = '0' + day;

    return d = [year, month, day].join('-');
}

// PLAIN TO THOUSAND SEPARATOR
function toThousand(num){
    var num_parts = num.toString().split(".");
    num_parts[0] = num_parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return num_parts.join(".");
}

// $('#kiri').height($('#kanan').height());
// $('#card-body-spp-inner').height($('#kanan-bawah').innerHeight());
$('#card-body-bulan-inner').height($('#kanan-bawah').innerHeight());