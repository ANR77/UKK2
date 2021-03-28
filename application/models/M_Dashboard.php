<?php
class M_Dashboard extends CI_Model
{
    // ambil jumlah transaksi
    function getTransaksi($date){
        return $this->db->query('SELECT pembayaran.id_pembayaran, pembayaran.tgl_bayar, pembayaran.jumlah_bayar, pembayaran.nama_petugas, siswa.nisn, siswa.nama, CONCAT(tingkat.tingkat_kelas," ",kejuruan.kompetensi_keahlian," ",kelas.nama_kelas) AS kelas_full
        FROM pembayaran
        INNER JOIN siswa ON pembayaran.id_siswa=siswa.id_siswa
        INNER JOIN kelas ON siswa.id_kelas=kelas.id_kelas
        INNER JOIN tingkat ON kelas.tingkat_kelas=tingkat.tingkat_kelas
        INNER JOIN kejuruan ON kelas.id_kejuruan=kejuruan.id_kejuruan
        WHERE tgl_bayar LIKE "'.$date.'%" 
        ORDER BY id_pembayaran DESC')->result_array();
    }

    // ambil jumlah siswa
    function jumlahSiswa(){
        $query = $this->db->query('SELECT * FROM siswa');
        return $query->num_rows();
    }

    // ambil jumlah kelas
    function jumlahKelas(){
        $query = $this->db->query('SELECT * FROM kelas');
        return $query->num_rows();
    }

    // ambil jumlah petugas
    function jumlahPetugas(){
        $query = $this->db->query('SELECT * FROM petugas');
        return $query->num_rows();
    }
}