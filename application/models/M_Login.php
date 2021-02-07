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
    function auth_user($username,$password){
        // $pass = md5($password);
        $this->db->select('*');
        $this->db->from('CHR_USER');
        $this->db->where('USER_USERNAME', $username);
        $this->db->where('USER_PASS', $password);
        return $this->db->get();
    }
}
