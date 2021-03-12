<?php
class M_Riwayat extends CI_Model
{
    //ambil data Tabel
    function getDataTabel(){ 
        return $this->db->query('SELECT pembayaran.id_pembayaran, pembayaran.tgl_bayar, pembayaran.jumlah_bayar, pembayaran.nama_petugas, siswa.nisn, siswa.nama, CONCAT(tingkat.tingkat_kelas," ",kejuruan.kompetensi_keahlian," ",kelas.nama_kelas) AS kelas_full
        FROM pembayaran
        INNER JOIN siswa ON pembayaran.id_siswa=siswa.id_siswa
        INNER JOIN kelas ON siswa.id_kelas=kelas.id_kelas
        INNER JOIN tingkat ON kelas.tingkat_kelas=tingkat.tingkat_kelas
        INNER JOIN kejuruan ON kelas.id_kejuruan=kejuruan.id_kejuruan
        ORDER BY id_pembayaran DESC')->result_array();
    }

    // get detail pembayaran
    function getDetailPembayaran($id){
        return $this->db->query('SELECT pembayaran.tgl_bayar, pembayaran.jumlah_bayar, pembayaran.bulan, pembayaran.kembalian, pembayaran.nama_petugas, siswa.nisn, siswa.nama, CONCAT(tingkat.tingkat_kelas," ",kejuruan.kompetensi_keahlian," ",kelas.nama_kelas) AS kelas_full
        FROM pembayaran
        INNER JOIN siswa ON pembayaran.id_siswa=siswa.id_siswa
        INNER JOIN kelas ON siswa.id_kelas=kelas.id_kelas
        INNER JOIN tingkat ON kelas.tingkat_kelas=tingkat.tingkat_kelas
        INNER JOIN kejuruan ON kelas.id_kejuruan=kejuruan.id_kejuruan
        WHERE pembayaran.id_pembayaran = '.$id)->result_array();
    }
}