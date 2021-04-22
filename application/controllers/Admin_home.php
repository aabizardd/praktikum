<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_home extends CI_Controller
{

    public function index()
    {

        $data['test'] = "hello";

        $this->load->view('template/header', $data);
        $this->load->view('admin/home');
        $this->load->view('template/footer');
    }

}