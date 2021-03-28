<?php
class M_Profil extends CI_Model
{
    //ambil data Petugas
    function getProfilPetugas($id){ 
        return $this->db->select('*')
        ->from('petugas')
        ->where('id_petugas',$id)->get()->row_array();
    }

    //ambil data where id
    function getProfilSiswa($nisn){
        return $this->db->query('SELECT siswa.*, CONCAT(tingkat.tingkat_kelas," ",kejuruan.kompetensi_keahlian," ",kelas.nama_kelas) AS kelas_full
        FROM siswa
        INNER JOIN kelas ON siswa.id_kelas=kelas.id_kelas
        INNER JOIN tingkat ON kelas.tingkat_kelas=tingkat.tingkat_kelas
        INNER JOIN kejuruan ON kelas.id_kejuruan=kejuruan.id_kejuruan
        WHERE siswa.nisn = '.$nisn)->row_array();
    }

    // cek password petugas
    function cekPassword($id_petugas, $password){
        return $this->db->select('*')
        ->from('petugas')
        ->where('id_petugas',$id_petugas)
        ->where('password',$password)
        ->get()->row_array();
    }

    // Get data spp siswa
    function getDataSpp($id_siswa){
        return $this->db->query('SELECT siswa_spp.angsuran, spp.nominal_angsuran, spp.keterangan, spp.tingkat
        FROM siswa_spp
        INNER JOIN spp ON siswa_spp.id_spp=spp.id_spp
        WHERE siswa_spp.id_siswa = '.$id_siswa)->result_array();
    }
}