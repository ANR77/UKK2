<?php
class M_Login extends CI_Model
{
    //cek nama dan password admin
    function authPetugas($username,$password){ 
        // $pass = md5($password);
        $this->db->select('*');
        $this->db->from('petugas');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        return $this->db->get()->row();
    }

    //cek nama dan password user
    function authSiswa($nisn,$nis){
        // $pass = md5($password);
        $this->db->select('*');
        $this->db->from('siswa');
        $this->db->where('nisn', $nisn);
        $this->db->where('nis', $nis);
        return $this->db->get()->row();
    }
}
