<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_listmodul extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');

        //load models
        $this->load->model('Asprak_model', 'asprak');

        // var_dump($this->session->all_userdata());die();

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
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 12;

        //initialize
        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['moduls'] = $this->asprak->get_limit('tb_praktikum', $config['per_page'], $data['start'], $data['keyword'])->result_array();

        $this->load->view('template/header');
        $this->load->view('admin/listModul', $data);
        $this->load->view('template/footer', $data);
    }

    public function detail_modul($id)
    {

        $where_1 = ['id_praktikum' => $id];
        $data['detail_modul'] = $this->asprak->get_where('tb_praktikum', $where_1)->row_array();

        $this->form_validation->set_rules('judul_praktikum', 'Judul Praktikum', 'required');
        $this->form_validation->set_rules('praktikum_ke', 'Praktikum Berapa', 'required');
        $this->form_validation->set_rules('tujuan_praktikum', 'Tujuan Praktikum', 'required');
        $this->form_validation->set_rules('materi_praktikum', 'Materi Praktikum', 'required');

        $data['modul_praktikum'] = $this->asprak->get('tb_praktikum')->result();

        $where_2 = ['id_praktikum' => $id];

        $data['bahan_praktikum'] = $this->asprak->get_where('tb_bahan_praktikum', $where_2)->result();

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('admin/detailModul', $data);
            $this->load->view('template/footer');
        } else {
            $this->updateaDataModul($id);
        }
    }

    public function updateaDataModul($id)
    {

        $judul_praktikum = $this->input->post('judul_praktikum');
        $praktikum_ke = $this->input->post('praktikum_ke');
        $tujuan_praktikum = $this->input->post('tujuan_praktikum');
        $materi_praktikum = $this->input->post('materi_praktikum');

        $data = [
            'judul_praktikum' => $judul_praktikum,
            'praktikum_ke' => $praktikum_ke,
            'tujuan_praktikum' => $tujuan_praktikum,
            'materi_praktikum' => $materi_praktikum,
        ];

        $where = ['id_praktikum' => $id];

        $this->asprak->update('tb_praktikum', $data, $where);

        $this->session->set_flashdata('flash', "Data Praktikum Berhasil Diubah");

        redirect("Admin_listmodul/detail_modul/$id");
    }

    public function hapus_modul($id)
    {

        $where = ["id_praktikum" => $id];

        $this->asprak->delete('tb_praktikum', $where);

        $this->session->set_flashdata('flash', "Data Praktikum Berhasil Dihapus!");

        redirect('Admin_listmodul');
    }

    public function alert($kata_depan = "", $warna, $isi)
    {

        $alert = '<div class="alert alert-' . $warna . ' alert-dismissible fade show" role="alert">
		<strong>' . $kata_depan . '</strong> ' . $isi . '
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
	  	</div>';

        return $alert;
    }
}