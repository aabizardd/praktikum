<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Praktikan_listmodul extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');

        //load models
        $this->load->model('Praktikan_model', 'praktikan');
        // $this->load->model('Asprak_model', 'asprak');

        // var_dump($this->session->all_userdata());die();

        if (!$this->session->userdata('id_role')) {
            redirect('auth');
        } else {

            if ($this->session->userdata('id_role') == 2) {
                redirect('admin_home');
            }

        }

    }

    public function index()
    {

        $data['title'] = "List Modul Praktikum";
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

        $config['base_url'] = base_url('praktikan_listmodul/index');
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 4;

        //initialize
        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['moduls'] = $this->praktikan->get_limit_modul('tb_praktikum', $config['per_page'], $data['start'], $data['keyword'])->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('praktikan/listModul', $data);
        $this->load->view('template/footer', $data);
    }

    public function detail_modul($id)
    {

        $data['title'] = "Pengumpulan Modul Praktikum";
        $data['modul'] = $this->praktikan->get_where('tb_praktikum', ['id_praktikum' => $id])->row_array();
        $where_2 = ['id_praktikum' => $id];

        $data['bahan_praktikum'] = $this->praktikan->get_where('tb_bahan_praktikum', $where_2)->result();

        $where_3 = [
            'id_praktikum' => $id,
            'id_praktikan' => $this->session->userdata('id_praktikan'),
        ];

        $is_assign = $this->praktikan->get_where('tb_pengumpulan_tugas', $where_3)->row_array();

        $data['is_assign'] = $is_assign;

        $this->load->view('template/header', $data);
        $this->load->view('praktikan/detailModul', $data);
        $this->load->view('template/footer');

    }

    public function upload_tugas()
    {
        // $this->form_validation->set_rules('file', 'File', 'required');

        //ambil data praktikan dulu untuk cek kelenglapan profile. Yang tidak lengkap belum bisa upload tugas

        $info_praktikan = $this->praktikan->get_where('tb_praktikan', ['id_user' => $this->session->userdata('id_user')])->row_array();
        $id_praktikum = $this->input->post('id_praktikum');

        // var_dump($info_praktikan);die();

        if (is_null($info_praktikan['nama_lengkap']) || is_null($info_praktikan['id_kelas']) || is_null($info_praktikan['kelompok'])) {

            $this->session->set_flashdata('flash-alert', 'Lengkapi Data Pribadi Terlebih Dahulu!');
            redirect("praktikan_listmodul/detail_modul/$id_praktikum");

        } else {

            $data = [
                'file' => $this->_uploadFile($id_praktikum),
                'id_praktikum' => $id_praktikum,
                'id_praktikan' => $this->session->userdata('id_praktikan'),
            ];

            $this->praktikan->insert('tb_pengumpulan_tugas', $data);

            $this->session->set_flashdata('flash', "Tugas Telah Dikumpulkan!");
            redirect("praktikan_listmodul/detail_modul/$id_praktikum");

        }

    }

    private function _uploadFile($id_praktikum)
    {

        $namaFiles = $_FILES['file']['name'];
        $ukuranFile = $_FILES['file']['size'];
        $type = $_FILES['file']['type'];
        $eror = $_FILES['file']['error'];
        $tmpName = $_FILES['file']['tmp_name'];

        // var_dump($namaFiles);die();

        if ($eror === 4) {

            $this->session->set_flashdata('flash-error', "Error upload");

            redirect("praktikan_listmodul/detail_modul/$id_praktikum");

            return false;
        }

        $ekstensiFileValid = ['pdf'];
        $ekstensiFile = explode('.', $namaFiles);
        $ekstensiFile = strtolower(end($ekstensiFile));
        if (!in_array($ekstensiFile, $ekstensiFileValid)) {

            $this->session->set_flashdata('flash-error', "Yang kamu pilih mungkin bukan file PDF?");

            redirect("praktikan_listmodul/detail_modul/$id_praktikum");

            return false;
        }

        $nim = $this->session->userdata('nim');

        $namaFilesBaru = $nim . "-prak" . $id_praktikum . "-";
        $namaFilesBaru .= uniqid();
        $namaFilesBaru .= '.';
        $namaFilesBaru .= $ekstensiFile;

        move_uploaded_file($tmpName, 'assets_praktikum/tugas/' . $namaFilesBaru);

        return $namaFilesBaru;

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