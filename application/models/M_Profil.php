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
}