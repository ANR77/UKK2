<?php
    function template($page,$data)
    {
        $CI = &get_instance();
        $CI->load->view('app/header',$data);
        $CI->load->view('app/sidebar');
        $CI->load->view('app/navbar');
        $CI->load->view($page);
        $CI->load->view('app/footer');
    }

    function templateVanilla($page,$data)
    {
        $CI = &get_instance();
        $CI->load->view('app/headerVanilla',$data);
        $CI->load->view($page);
        $CI->load->view('app/footerVanilla');
    }
