<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Praktikan_home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');

        //load models
        $this->load->model('Praktikan_model', 'praktikan');

        if (!$this->session->userdata('id_role')) {
            redirect('auth');
        } else {

            if ($this->session->userdata('id_role') == 2) {
                redirect('admin_home');
            }

        }

        $info_praktikan = $this->praktikan->get_where('tb_praktikan', ['id_user' => $this->session->userdata('id_user')])->row_array();

        // var_dump($info_praktikan['nama_lengkap']);die();
        $this->session->set_userdata('foto_profile', $info_praktikan['foto_profile']);
        $this->session->set_userdata('nama_praktikan', $info_praktikan['nama_lengkap']);

    }

    public function index()
    {

        $this->load->view('template/header');
        $this->load->view('praktikan/home');
        $this->load->view('template/footer');

    }

    public function logout()
    {

        $this->session->sess_destroy();

        redirect('auth');

    }

}