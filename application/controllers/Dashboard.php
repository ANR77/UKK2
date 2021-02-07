<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if (!$this->session->has_userdata('login')) {
            redirect('/');
        }
    }

	public function index(){
        $data = array(
            'title' => 'Dashboard'
        );
        template('dashboard/dashboard',$data);
	}
}