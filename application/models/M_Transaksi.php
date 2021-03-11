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

    // ambil data spp
    function getSppByIdSiswa($id){
        return $this->db->query('SELECT siswa_spp.id_siswa_spp, siswa_spp.jumlah_angsuran, siswa_spp.angsuran, spp.id_spp, spp.tingkat, spp.keterangan, spp.tahun, spp.nominal_angsuran, siswa.id_siswa, siswa.nama, siswa.nisn
        FROM siswa_spp
        INNER JOIN spp ON siswa_spp.id_spp=spp.id_spp
        INNER JOIN siswa ON siswa_spp.id_siswa=siswa.id_siswa
        WHERE siswa_spp.id_siswa ='.$id)->result_array();
    }

    // ambil data siswa
    function getSiswaByCondition($condition){
        return $this->db->query('SELECT siswa.id_siswa,siswa.nisn, siswa.nama, CONCAT(tingkat.tingkat_kelas," ",kejuruan.kompetensi_keahlian," ",kelas.nama_kelas) AS kelas_full
        FROM siswa
        INNER JOIN kelas ON siswa.id_kelas=kelas.id_kelas
        INNER JOIN tingkat ON kelas.tingkat_kelas=tingkat.tingkat_kelas
        INNER JOIN kejuruan ON kelas.id_kejuruan=kejuruan.id_kejuruan
        WHERE siswa.nisn LIKE "%'.$condition.'%" OR siswa.nama LIKE "%'.$condition.'%"')->result_array();
    }

    function failPembayaran($data){
        return $this->db->select('id_pembayaran')
        ->from('pembayaran')
        ->where($data)
        ->get()
        ->result_array();
    }

    //ambil data where id
    function getById($id){
        $this->db->select('*');
        $this->db->from('petugas');
        $this->db->where('id_petugas',$id);
        return $this->db->get()->row();
    }
}