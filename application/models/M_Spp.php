<?php
class M_Spp extends CI_Model
{
    function getDataTabel(){
        $this->db->select('*');
        $this->db->from('spp');
        return $this->db->get()->result_array();
    }

    //ambil data Siswa
    function getKelasSiswa(){ 
        $this->db->select('id_kelas');
        $this->db->from('siswa');
        return $this->db->get()->result_array();
    }

    //ambil data kelas
    function getKelas(){ 
        return $this->db->query('SELECT kelas.id_kelas,kelas.tingkat_kelas, kejuruan.kompetensi_keahlian, kelas.nama_kelas
        FROM kelas
        INNER JOIN kejuruan ON kelas.id_kejuruan=kejuruan.id_kejuruan')->result();
    }

    // ambil kelas untuk insert tabel spp BY tingkat
    function getKelasByTingkat($tingkat){
        $this->db->select('id_kelas');
        $this->db->from('kelas');
        $this->db->where('tingkat_kelas',$tingkat);
        return $this->db->get()->result_array();
    }

    // ambil data tingkat
    function getTingkat(){
        $this->db->select('*');
        $this->db->from('tingkat');
        return $this->db->get()->result_array();
    }

    // ambil kode entri spp
    function getKodeEntri(){
        return $this->db->order_by('kode_entri',"desc")
            ->limit(1)
            ->get('spp')
            ->row_array();
    }

    // ambil id_spp BY kode_entri, tingkat
    function getIdSppByEntri($tingkat, $kode_entri){
        $this->db->select('id_spp')
        ->from('spp')
        ->where('tingkat',$tingkat)
        ->where('kode_entri',$kode_entri);
        return $this->db->get()->row_array();
    }

    // ambil data siswa BY id_kelas
    function getIdSiswa($id_kelas){
        $this->db->select('id_siswa');
        $this->db->from('siswa');
        $this->db->where('id_kelas',$id_kelas);
        return $this->db->get()->result_array();
    }

    // cek Spp tingkat dan tahun
    function cekSpp($tingkat, $tahun){
        $this->db->select('*')
        ->from('spp')
        ->where('tingkat',$tingkat)
        ->where('tahun',$tahun);
        return $this->db->get()->row();
    }

    // get spp by id_spp
    function getSppById($id_spp){
        return $this->db->select('*')
        ->from('spp')
        ->where('id_spp',$id_spp)
        ->get()->row_array();
    }

    // get data laporan by id_spp dan id_kelas
    function getDataLaporan($id_spp, $id_kelas){
        return $this->db->query('SELECT siswa.nisn, siswa.nis, siswa.nama, spp.jumlah_angsuran AS jumlah_tagihan, spp.nominal_angsuran*siswa_spp.angsuran AS jumlah_angsuran, spp.jumlah_angsuran-(spp.nominal_angsuran*siswa_spp.angsuran) AS jumlah_tanggungan
        FROM siswa_spp
        INNER JOIN siswa ON siswa_spp.id_siswa=siswa.id_siswa
        INNER JOIN spp ON siswa_spp.id_spp=spp.id_spp
        WHERE siswa.id_kelas = '.$id_kelas.' AND siswa_spp.id_spp = '.$id_spp)->result_array();
    }

    function getKelasById($id_kelas){
        return $this->db->query('SELECT CONCAT(tingkat.tingkat_kelas," ",kejuruan.kompetensi_keahlian," ",kelas.nama_kelas) AS kelas_full
        FROM kelas
        INNER JOIN tingkat ON kelas.tingkat_kelas=tingkat.tingkat_kelas
        INNER JOIN kejuruan ON kelas.id_kejuruan=kejuruan.id_kejuruan
        WHERE kelas.id_kelas = '.$id_kelas)->row_array();
    }

    function getDataSpp($id_spp){
        return $this->db->select('keterangan, tahun')
        ->from('spp')
        ->where('id_spp',$id_spp)
        ->get()->row_array();
    }

    function getKelasTingkat($id_spp){
        return $this->db->query('SELECT kelas.id_kelas, CONCAT(tingkat.tingkat_kelas," ",kejuruan.kompetensi_keahlian," ",kelas.nama_kelas) AS kelas_full
        FROM spp
        INNER JOIN kelas ON spp.tingkat=kelas.tingkat_kelas
        INNER JOIN tingkat ON kelas.tingkat_kelas=tingkat.tingkat_kelas
        INNER JOIN kejuruan ON kelas.id_kejuruan=kejuruan.id_kejuruan
        WHERE spp.id_spp = '.$id_spp)->result_array();
    }

    function delSppPembayaran($id_spp){
        $this->db->where('id_spp',$id_spp);
        if ($this->db->delete('pembayaran')) {
            return true;
        } else {
            return false;
        }
    }

    function delSiswaSpp($id_spp){
        $this->db->where('id_spp',$id_spp);
        if ($this->db->delete('siswa_spp')) {
            return true;
        } else {
            return false;
        }
    }
}