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

        $this->session->set_userdata('foto_profile', $info_praktikan['foto_profile']);
        $this->session->set_userdata('nama_praktikan', $info_praktikan['nama_lengkap']);
        $this->session->set_userdata('kelas', $info_praktikan['id_kelas']);
        $this->session->set_userdata('kelompok', $info_praktikan['kelompok']);
        $this->session->set_userdata('id_praktikan', $info_praktikan['id_praktikan']);

        // var_dump($this->session->userdata('id_praktikan'));die();
    }

    public function index()
    {

        $data['jumlah_modul'] = $this->praktikan->count_all_results('tb_praktikum');

        $this->load->view('template/header');
        $this->load->view('praktikan/home', $data);
        $this->load->view('template/footer');

    }

    public function logout()
    {

        $this->session->sess_destroy();

        redirect('auth');

    }

}