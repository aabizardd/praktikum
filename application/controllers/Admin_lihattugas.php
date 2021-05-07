<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_lihattugas extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');

        //load models
        $this->load->model('Asprak_model', 'asprak');

        if (!$this->session->userdata('id_role')) {
            redirect('auth');
        } else {

            if ($this->session->userdata('id_role') == 1) {
                redirect('praktikan_home');
            }

        }

        // var_dump($this->session->userdata('foto_profile'));die();

    }

    public function index()
    {

        //load libraray
        $this->load->library('pagination');

        //ambil data keyword
        if ($this->input->post('submit')) {
            // var_dump($this->input->post('keyword'));die();
            $data['keyword'] = $this->input->post('keyword');
            $this->session->set_userdata('keyword', $data['keyword']);
        } else {
            $data['keyword'] = $this->session->userdata('keyword');
        }

        $this->session->unset_userdata('keyword');

        //config
        $this->db->like('judul_praktikum', $data['keyword']);
        $this->db->from('tb_praktikum');
        $config['total_rows'] = $this->db->count_all_results();

        $config['base_url'] = base_url('Admin_lihattugas/index');
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 4;

        //initialize
        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['moduls'] = $this->asprak->get_limit('tb_praktikum', $config['per_page'], $data['start'], $data['keyword'])->result_array();

        $this->load->view('template/header');
        $this->load->view('admin/lihat_tugas', $data);
        $this->load->view('template/footer');
    }

    public function praktikan_tugas($id)
    {

        $data['praktikum'] = $this->asprak->get_where('tb_praktikum', ['id_praktikum' => $id])->row_array();

        $data['assign'] = $this->asprak->get_pengumpulan_tugas($id)->result();

        $praktikan_done = $this->asprak->get_pengumpulan_tugas($id)->result();

        // $stack = array("orange", "banana");
        // array_push($stack, "apple", "raspberry");
        // print_r($stack);

        $data_nama = [];

        foreach ($praktikan_done as $item) {

            array_push($data_nama, $item->id_praktikan);

        }

        // var_dump($data_nama);die();

        $data['not_assign'] = $this->asprak->get_not_pengumpulan_tugas($data_nama)->result();

        $this->load->view('template/header');
        $this->load->view('admin/tabel_pengumpulan', $data);
        $this->load->view('template/footer');
    }
}