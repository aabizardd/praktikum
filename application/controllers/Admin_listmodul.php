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

        $config['base_url'] = base_url('admin_listmodul/index');
        $data['total_rows'] = $config['total_rows'];
        $config['per_page'] = 4;

        //initialize
        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(3);
        $data['moduls'] = $this->asprak->get_limit('tb_praktikum', $config['per_page'], $data['start'], $data['keyword'])->result_array();

        $this->load->view('template/header', $data);
        $this->load->view('admin/listModul', $data);
        $this->load->view('template/footer', $data);
    }

    public function detail_modul($id)
    {
        $data['title'] = "Detail Modul Praktikum";
        $where_1 = ['id_praktikum' => $id];
        $data['detail_modul'] = $this->asprak->get_where('tb_praktikum', $where_1)->row_array();

        $this->form_validation->set_rules('judul_praktikum', 'Judul Praktikum', 'required');
        $this->form_validation->set_rules('praktikum_ke', 'Praktikum Berapa', 'required');
        $this->form_validation->set_rules('tujuan_praktikum', 'Tujuan Praktikum', 'required');
        $this->form_validation->set_rules('tanggal_deadline', 'Tanggal Deadline', 'required');
        $this->form_validation->set_rules('jam_deadline', 'Jam Deadline', 'required');
        $this->form_validation->set_rules('materi_praktikum', 'Materi Praktikum', 'required');

        $data['modul_praktikum'] = $this->asprak->get('tb_praktikum')->result();

        $where_2 = ['id_praktikum' => $id];

        $data['bahan_praktikum'] = $this->asprak->get_where('tb_bahan_praktikum', $where_2)->result();

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('admin/detailModul', $data);
            $this->load->view('template/footer');
        } else {
            $this->updateaDataModul($id);
        }
    }

    public function update_bahan()
    {

        $judul_bahan = $this->input->post('judul_bahan');
        $keterangan_bahan = $this->input->post('keterangan_bahan');
        $id_bahan = $this->input->post('id_bahan');
        $foto_bahan_lama = $this->input->post('foto_bahan');

        $foto_bahan_baru = $_FILES['file']['name'];
        $id_praktikum = $this->input->post('id_praktikum');

        $data = [];

        if ($foto_bahan_baru) {

            $file = 'assets_praktikum/img_bahan_modul/' . $foto_bahan_lama;

            $data = [
                'judul_bahan' => $judul_bahan,
                'keterangan_bahan' => $keterangan_bahan,
                'foto_bahan' => $this->_uploadFile($id_praktikum, $file),
            ];

        } else {

            $data = [
                'judul_bahan' => $judul_bahan,
                'keterangan_bahan' => $keterangan_bahan,
                'foto_bahan' => $foto_bahan_lama,
            ];

        }

        // $data = [
        //     'judul_bahan' => $judul_bahan,
        //     'keterangan_bahan' => $keterangan_bahan,
        //     'foto_bahan' => $foto_bahan,
        // ];
        $where = ['id_bahan' => $id_bahan];

        $this->asprak->update('tb_bahan_praktikum', $data, $where);

        $this->session->set_flashdata('flash', "Data Bahan Praktikum Berhasil Diubah");

        redirect("Admin_listmodul/detail_modul/$id_praktikum");

    }

    private function _uploadFile($id_praktikum, $file)
    {

        $namaFiles = $_FILES['file']['name'];
        $ukuranFile = $_FILES['file']['size'];
        $type = $_FILES['file']['type'];
        $eror = $_FILES['file']['error'];
        $tmpName = $_FILES['file']['tmp_name'];

        // var_dump($namaFiles);die();

        if ($eror === 4) {

            $this->session->set_flashdata('flash-error', "Error upload");

            redirect("admin_listmodul/detail_modul/$id_praktikum");

            return false;
        }

        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFiles);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {

            $this->session->set_flashdata('flash-error', "Yang kamu pilih mungkin bukan gambar?");

            redirect("admin_listmodul/detail_modul/$id_praktikum");

            return false;
        }

        if (is_readable($file) && unlink($file)) {

            $namaFilesBaru = uniqid();
            $namaFilesBaru .= '.';
            $namaFilesBaru .= $ekstensiGambar;

            move_uploaded_file($tmpName, 'assets_praktikum/img_bahan_modul/' . $namaFilesBaru);

            return $namaFilesBaru;

        }

    }

    public function updateaDataModul($id)
    {

        $judul_praktikum = $this->input->post('judul_praktikum');
        $praktikum_ke = $this->input->post('praktikum_ke');
        $tujuan_praktikum = $this->input->post('tujuan_praktikum');
        $materi_praktikum = $this->input->post('materi_praktikum');
        $tanggal_deadline = $this->input->post('tanggal_deadline');
        $jam_deadline = $this->input->post('jam_deadline');

        $data = [
            'judul_praktikum' => $judul_praktikum,
            'praktikum_ke' => $praktikum_ke,
            'tujuan_praktikum' => $tujuan_praktikum,
            'materi_praktikum' => $materi_praktikum,
            'deadline_tanggal' => $tanggal_deadline,
            'deadline_jam' => $jam_deadline,
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

    public function hapus_bahan($filename, $id_bahan, $id_praktikum)
    {

        $file = 'assets_praktikum/img_bahan_modul/' . $filename;

        if (is_readable($file) && unlink($file)) {

            $where = ['id_bahan' => $id_bahan];

            $this->asprak->delete('tb_bahan_praktikum', $where);

            $this->session->set_flashdata('flash', "Data Bahan Praktikum Berhasil Dihapus");

            redirect("Admin_listmodul/detail_modul/$id_praktikum");
        }
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