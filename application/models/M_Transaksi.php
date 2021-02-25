<?php
class M_Transaksi extends CI_Model
{
    //ambil data Petugas
    function getSiswa(){ 
        return $this->db->query('SELECT siswa.id_siswa,siswa.nisn, siswa.nama, CONCAT(tingkat.tingkat_kelas," ",kejuruan.kompetensi_keahlian," ",kelas.nama_kelas) AS kelas_full
        FROM siswa
        INNER JOIN kelas ON siswa.id_kelas=kelas.id_kelas
        INNER JOIN tingkat ON kelas.tingkat_kelas=tingkat.tingkat_kelas
        INNER JOIN kejuruan ON kelas.id_kejuruan=kejuruan.id_kejuruan')->result_array();
    }

    function getSppByIdSiswa($id){
        return $this->db->query('SELECT siswa_spp.id, siswa_spp.kode_spp, siswa_spp.nominal, spp.keterangan
        FROM siswa_spp
        INNER JOIN spp ON siswa_spp.kode_spp=spp.kode_spp
        WHERE siswa_spp.id_siswa ='.$id)->result_array();
    }

    //ambil data where id
    function getById($id){
        $this->db->select('*');
        $this->db->from('petugas');
        $this->db->where('id_petugas',$id);
        return $this->db->get()->row();
    }
}