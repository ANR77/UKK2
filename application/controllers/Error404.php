<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error404 extends CI_Controller {

	public function index()
	{
		if ($this->session->userdata('login')) {
            $this->output->set_status_header('404');
            $data = array(
                'title' => '404 Not Found'
            );
            template('errors/Custom404',$data);
        } else {
            $data = array(
                'title' => '404 Not Found'
            );
            $this->output->set_status_header('404'); 
            templateVanilla('errors/Custom404',$data);
        }
	}
}