<?php
class M_Riwayat extends CI_Model
{
    //ambil data Petugas
    function getPetugas(){ 
        $this->db->select('*');
        $this->db->from('petugas');
        return $this->db->get()->result_array();
    }

    //ambil data where id
    function getById($id){
        $this->db->select('*');
        $this->db->from('petugas');
        $this->db->where('id_petugas',$id);
        return $this->db->get()->row();
    }
}