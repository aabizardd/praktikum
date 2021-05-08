<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_tambahmodul extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');

        //load models
        $this->load->model('Asprak_model');

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
        $data['title'] = "Tambah Modul Praktikum";

        $this->form_validation->set_rules('judul_praktikum', 'Judul Praktikum', 'required');
        $this->form_validation->set_rules('praktikum_ke', 'Praktikum Berapa', 'required');
        $this->form_validation->set_rules('tujuan_praktikum', 'Tujuan Praktikum', 'required');
        $this->form_validation->set_rules('tanggal_deadline', 'Tanggal Deadline', 'required');
        $this->form_validation->set_rules('jam_deadline', 'Jam Deadline', 'required');
        $this->form_validation->set_rules('materi_praktikum', 'Materi Praktikum', 'required');

        $data['modul_praktikum'] = $this->Asprak_model->get('tb_praktikum')->result();

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('admin/tambahModul', $data);
            $this->load->view('template/footer');
        } else {
            $this->tambahDataModul();
        }
    }

    public function tambahDataModul()
    {

        $judul_praktikum = $this->input->post('judul_praktikum');
        $praktikum_ke = $this->input->post('praktikum_ke');
        $tujuan_praktikum = $this->input->post('tujuan_praktikum');
        $tanggal_deadline = $this->input->post('tanggal_deadline');
        $jam_deadline = $this->input->post('jam_deadline');

        // var_dump($jam_deadline);die();

        $materi_praktikum = $this->input->post('materi_praktikum');

        $data = [
            'judul_praktikum' => $judul_praktikum,
            'praktikum_ke' => $praktikum_ke,
            'tujuan_praktikum' => $tujuan_praktikum,
            'deadline_tanggal' => $tanggal_deadline,
            'deadline_jam' => $jam_deadline,
            'materi_praktikum' => $materi_praktikum,
        ];

        $this->Asprak_model->insert('tb_praktikum', $data);

        $this->session->set_flashdata('flash', "Data Praktikum Berhasil Ditambahkan, Silahkan Untuk Menambahkan Bahan-Bahan Praktikum nya");

        redirect('Admin_tambahmodul');
    }

    public function tambahDataBahan()
    {

        $id_praktikum = $this->input->post('id_praktikum');
        $judul_bahan = $this->input->post('judul_bahan');
        $keterangan_bahan = $this->input->post('keterangan_bahan');
        // $foto_bahan = ;

        foreach ($judul_bahan as $key => $value) {

            $data = [
                'judul_bahan' => $value,
                'keterangan_bahan' => $keterangan_bahan[$key],
                'foto_bahan' => $this->_uploadFile($key, $id_praktikum),
                'id_praktikum' => $id_praktikum,
            ];

            $this->Asprak_model->insert('tb_bahan_praktikum', $data);
        }

        // $flahdata = $this->alert('Salamat', 'success', 'Bahan Praktikum Berhasil Ditambahkan!');

        $this->session->set_flashdata('flash', "Bahan Praktikum Berhasil Ditambahkan!");

        redirect('Admin_tambahmodul');
    }

    public function list_modul()
    {

        $this->load->view('template/header');
        $this->load->view('admin/listModul');
        $this->load->view('template/footer');
    }

    private function _uploadFile($key, $praktikum)
    {
        $namaFiles = $_FILES['foto_bahan']['name'][$key];
        $ukuranFile = $_FILES['foto_bahan']['size'][$key];
        $type = $_FILES['foto_bahan']['type'][$key];
        $eror = $_FILES['foto_bahan']['error'][$key];

        // $nama_file = str_replace(" ", "_", $namaFiles);
        $tmpName = $_FILES['foto_bahan']['tmp_name'][$key];
        // $nama_folder = "assets_user/file_upload/";
        // $file_baru = $nama_folder . basename($nama_file);

        // if ((($type == "video/mp4") || ($type == "video/3gpp")) && ($ukuranFile < 8000000)) {

        //   move_uploaded_file($tmpName, $file_baru);
        //   return $file_baru;
        // }

        // var_dump($namaFiles);die();

        if ($eror === 4) {
            $flahdata = $this->alert('Maaf', 'danger', 'Gagal Mengunggah Gambar!');

            $this->session->set_flashdata('alert', $flahdata);

            redirect('admin_home/tambah_modul');
            return false;
        }

        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];

        $ekstensiGambar = explode('.', $namaFiles);
        // var_dump($namaFiles);die();

        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            $flahdata = $this->alert('Maaf', 'danger', 'Ada File yang Kamu Upload Bukan Gambar!');

            $this->session->set_flashdata('alert', $flahdata);

            redirect('admin_home/tambah_modul');
            return false;
        }

        $namaFilesBaru = "bahan_prak$praktikum-";
        $namaFilesBaru .= uniqid();
        $namaFilesBaru .= '.';
        $namaFilesBaru .= $ekstensiGambar;

        move_uploaded_file($tmpName, 'assets_praktikum/img_bahan_modul/' . $namaFilesBaru);

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