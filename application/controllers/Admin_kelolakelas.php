<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_kelolakelas extends CI_Controller
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
        $this->db->like('nama_kelas', $data['keyword']);
        $this->db->from('tb_kelas');
        $config['total_rows'] = $this->db->count_all_results();

        $config['base_url'] = base_url('admin_kelolakelas/index');
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 4;

        //initialize
        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['classes'] = $this->asprak->get_limit_kelas('tb_kelas', $config['per_page'], $data['start'], $data['keyword'])->result_array();

        $data['praktikans'] = $this->asprak->getPraktikansAll()->result();

        $this->load->view('template/header');
        $this->load->view('admin/listKelas', $data);
        $this->load->view('template/footer', $data);
    }

    public function tambah_kelas()
    {

        $this->form_validation->set_rules('nama_kelas', 'Nama Kelas', 'required');

        $data = [
            'nama_kelas' => $this->input->post('nama_kelas'),
        ];

        if ($this->form_validation->run() == false) {

            $this->session->set_flashdata('flash-error', 'Cek Nama Kelas Mu Lagi!');
            redirect('admin_kelolakelas');

        } else {

            $this->asprak->insert('tb_kelas', $data);
            $this->session->set_flashdata('flash', 'Data Kelas Berhasil Ditambah!');
            redirect('admin_kelolakelas');

        }

    }

    public function hapus_kelas($id)
    {

        $this->asprak->delete('tb_kelas', ['id_kelas' => $id]);

        $this->session->set_flashdata('flash', 'Data Kelas Berhasil Dihapus!');
        redirect('admin_kelolakelas');

    }

    public function edit_kelas()
    {
        $this->form_validation->set_rules('nama_kelas', 'Nama Kelas', 'required');

        $id_kelas = $this->input->post('id_kelas');
        $nama_kelas = $this->input->post('nama_kelas');

        $data = [
            'nama_kelas' => $nama_kelas,
        ];

        if ($this->form_validation->run() == false) {

            $this->session->set_flashdata('flash-error', 'Cek Nama Kelas Mu Lagi!');
            redirect('admin_kelolakelas');

        } else {

            $data = [
                'nama_kelas' => $nama_kelas,
            ];

            // $this->asprak->insert('tb_kelas', $data);
            $this->asprak->update('tb_kelas', $data, ['id_kelas' => $id_kelas]);
            $this->session->set_flashdata('flash', 'Data Kelas Berhasil Diubah!');
            redirect('admin_kelolakelas');

        }
    }

    public function change_status($tipe, $id)
    {

        $pesan = "";
        $data = [];
        if ($tipe == "aktif") {

            $pesan = "Diaktifkan";
            $data = [
                'status_active' => 1,
            ];

        } else {

            $pesan = "Dinonaktifkan";
            $data = [
                'status_active' => 0,
            ];

        }

        $this->asprak->update('tb_user', $data, ['id_user' => $id]);

        $this->session->set_flashdata('flash', "Data Kelas Berhasil $pesan!");
        redirect('admin_kelolakelas');

    }

    public function hapus_data_praktikan($id_user)
    {

        $this->asprak->delete('tb_user', ['id_user' => $id_user]);

        $this->session->set_flashdata('flash', "Data Praktikan Berhasil Dihapus!");
        redirect('admin_kelolakelas');
    }

    public function show_praktikan_by_kelas($id_kelas)
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

        $this->db->like('nama_lengkap', $data['keyword']);
        $this->db->where('id_kelas', $id_kelas);
        $this->db->from('tb_praktikan');
        $config['total_rows'] = $this->db->count_all_results();

        $config['base_url'] = base_url("Admin_kelolakelas/show_praktikan_by_kelas/$id_kelas");
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 6;
        $config['uri_segment'] = 4;

        //initialize
        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(4);

        $data['classes'] = $this->asprak->get_limit_praktikan('tb_praktikan', $config['per_page'], $data['start'], $data['keyword'], $id_kelas)->result_array();

        // var_dump($data['classes']);die();

        // $data['praktikans'] = $this->asprak->getPraktikansAll()->result();

        $data['kelas'] = $this->asprak->get_where('tb_kelas', ['id_kelas' => $id_kelas])->row_array();

        $this->load->view('template/header');
        $this->load->view('admin/listPraktikan', $data);
        $this->load->view('template/footer', $data);

    }

}