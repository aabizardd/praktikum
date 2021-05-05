<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_profile extends CI_Controller
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

        $data['info_asprak'] = $this->asprak->getDetailInfoAsprak()->row_array();
        $nim = $this->input->post('nim');
        $email = $this->input->post('email');

        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');

        // var_dump($data['info_asprak']['nama_lengkap']);die();
        if ($data['info_asprak']['nim'] != $nim && $data['info_asprak']['email'] != $email) {
            $this->form_validation->set_rules('nim', 'NIM', 'required|trim|is_unique[tb_user.nim]', [
                'is_unique' => 'NIM ini sudah digunakan!',
            ]);
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tb_user.email]', [
                'is_unique' => 'Email ini sudah digunakan!',
            ]);
        } elseif ($data['info_asprak']['nim'] != $nim) {
            $this->form_validation->set_rules('nim', 'NIM', 'required|trim|is_unique[tb_user.nim]', [
                'is_unique' => 'NIM ini sudah digunakan!',
            ]);

        } elseif ($data['info_asprak']['email'] != $email) {
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tb_user.email]', [
                'is_unique' => 'Email ini sudah digunakan!',
            ]);
        }

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('admin/admin_profile', $data);
            $this->load->view('template/footer');
        } else {
            $this->updateProfile();
        }

    }

    public function updateProfile()
    {

        $nama_lengkap = $this->input->post('nama_lengkap');
        $nim = $this->input->post('nim');
        $email = $this->input->post('email');
        $foto_bahan_lama = $this->input->post('foto_bahan');
        $foto_bahan_baru = $_FILES['file']['name'];

        $data_asprak = [];

        // var_dump($foto_bahan_baru);die();

        if ($foto_bahan_baru) {

            $file = 'assets_praktikum/img_profile/asprak/' . $foto_bahan_lama;

            $data_asprak = [
                'nama_lengkap' => $nama_lengkap,
                'foto_profile' => $this->_uploadFile($file, $foto_bahan_lama),
            ];

            $this->session->unset_userdata('foto_profile');
            $this->session->set_userdata('foto_profile', $data_asprak['foto_profile']);
        } else {
            $data_asprak = [
                'nama_lengkap' => $nama_lengkap,
                'foto_profile' => $foto_bahan_lama,
            ];
        }

        $data_user = [
            'nim' => $nim,
            'email' => $email,
        ];

        $this->asprak->update('tb_admin', $data_asprak, ['id_user' => $this->session->userdata('id_user')]);
        $this->asprak->update('tb_user', $data_user, ['id_user' => $this->session->userdata('id_user')]);

        $this->session->set_flashdata('flash', 'Data Profil Berhasil Diubah!');

        redirect('admin_profile');

    }

    private function _uploadFile($file, $filelama)
    {

        $namaFiles = $_FILES['file']['name'];
        $ukuranFile = $_FILES['file']['size'];
        $type = $_FILES['file']['type'];
        $eror = $_FILES['file']['error'];
        $tmpName = $_FILES['file']['tmp_name'];

        // var_dump($namaFiles);die();

        if ($eror === 4) {

            $this->session->set_flashdata('flash-error', "Error upload");

            redirect("admin_profile");

            return false;
        }

        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFiles);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {

            $this->session->set_flashdata('flash-error', "Yang kamu pilih mungkin bukan gambar?");

            redirect("admin_profile");

            return false;
        }

        if ($filelama == "default.jpg") {
            $namaFilesBaru = uniqid();
            $namaFilesBaru .= '.';
            $namaFilesBaru .= $ekstensiGambar;

            move_uploaded_file($tmpName, 'assets_praktikum/img_profile/asprak/' . $namaFilesBaru);

            return $namaFilesBaru;
        } else {
            if (is_readable($file) && unlink($file)) {

                $namaFilesBaru = uniqid();
                $namaFilesBaru .= '.';
                $namaFilesBaru .= $ekstensiGambar;

                move_uploaded_file($tmpName, 'assets_praktikum/img_profile/asprak/' . $namaFilesBaru);

                return $namaFilesBaru;
            }
        }

    }

    public function update_password()
    {

        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [
            'matches' => 'Password Tidak Sama!!',
            'min_length' => 'Password Terlalu Pendek!',
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        $this->form_validation->set_rules('password_lama', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('flash-error', "Coba Cek Lagi Password Baru Mu!");
            redirect('admin_profile/');
        } else {

            $this->updatePassword();

        }

    }

    public function updatePassword()
    {

        $info_asprak = $this->asprak->get_where('tb_user', ['id_user' => $this->session->userdata('id_user')])->row_array();

        $password_lama = $this->input->post('password_lama');
        $password1 = $this->input->post('password1');

        $data = [
            'password' => password_hash($password1, PASSWORD_DEFAULT),
        ];

        if (password_verify($password_lama, $info_asprak['password'])) {

            $this->asprak->update('tb_user', $data, ['id_user' => $this->session->userdata('id_user')]);
            $this->session->set_flashdata('flash', "Password Berhasil Diubah!");

        } else {
            $this->session->set_flashdata('flash-error', "Password Lama Salah!");
        }

        redirect('admin_profile/');

    }

}