<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');

        //load models
        $this->load->model('Auth_model');

        // var_dump($this->session->all_userdata());die();

        if ($this->session->userdata('id_role') == 2) {
            redirect('Admin_home');
        } elseif ($this->session->userdata('id_role') == 1) {
            redirect('');
        }
    }

    public function index()
    {

        $this->form_validation->set_rules('nim', 'NIM', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('auth/login');
            $this->load->view('template/footer');
        } else {
            $this->_login();
        }

    }

    private function _login()
    {
        $nim = $this->input->post('nim');
        $password = $this->input->post('password');

        $user = $this->db->get_where('tb_user', [
            'nim' => $nim,
        ])->row_array();
        // ada user
        if ($user) {
            // jika aktif

            if ($user['status_active'] == 1) {

                //cek password
                if (password_verify($password, $user['password'])) {

                    $data = [
                        'nim' => $user['nim'],
                        'email' => $user['email'],
                        'id_role' => $user['id_role'],
                        'id_user' => $user['id_user'],
                    ];

                    $this->session->set_userdata($data);

                    if ($user['id_role'] == 2) {

                        redirect('Admin_home');
                    } else {
                        var_dump('kamu praktikan');die();
                    }
                } else {
                    $pesan = $this->alert('Maaf!', 'danger', "Password Salah!");
                    $this->session->set_flashdata('alert', $pesan);

                    redirect('auth');
                }
            } else {

                $pesan = $this->alert('Maaf!', 'danger', "Email belum aktif!");
                $this->session->set_flashdata('alert', $pesan);

                redirect('auth');
            }
        } else {

            $pesan = $this->alert('Maaf!', 'danger', "Email belum terdaftar!");
            $this->session->set_flashdata('alert', $pesan);

            redirect('auth');
        }
    }

    public function registration()
    {

        $this->form_validation->set_rules('nim', 'NIM', 'required|trim|is_unique[tb_user.nim]', [
            'is_unique' => "NIM ini sudah digunakan!",
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tb_user.email]', [
            'is_unique' => 'Email ini sudah ada!',
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [
            'matches' => 'Password Tidak Sama!!',
            'min_length' => 'Password Terlalu Pendek!',
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('auth/registration');
            $this->load->view('template/footer');
        } else {
            $data = [
                'nim' => htmlspecialchars($this->input->post('nim')),
                'email' => htmlspecialchars($this->input->post('email')),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'id_role' => 1,
            ];

            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => htmlspecialchars($this->input->post('email')),
                'token' => $token,
                'date_created' => time(),
            ];

            $this->Auth_model->insert('tb_user', $data);
            $this->Auth_model->insert('tb_user_token', $user_token);

            $this->_sendEmail($token, 'verify');

            $pesan = $this->alert('Selamat!', 'success', "Akun anda telah berhasil didaftarkan, silahkan aktivasi akun ke email anda!");
            $this->session->set_flashdata('alert', $pesan);

            redirect('auth');

        }

    }

    private function _sendEmail($token, $type)
    {

        $this->load->library('email');
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'unregistered30@gmail.com',
            'smtp_pass' => 'Medellincartel13!',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n",
        ];

        $this->email->initialize($config);
        $this->email->from('asprak121@gmail.com', 'Admin Website Prakas');
        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {

            $this->email->subject('Account Verification');
            $this->email->message('Klik link ini untuk aktivasi akun anda : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a> <br> Token aktivasi akan berlaku selama 2x24 jam, lebih dari itu token tidak akan berlaku kembali');
        } else if ($type == 'forgot') {

            $this->email->subject('Reset Password');
            $this->email->message('Klik link ini untuk mengubah password akun anda : <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a> <br> Token aktivasi akan berlaku selama 2x24 jam, lebih dari itu token tidak akan berlaku kembali');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function verify()
    {

        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('tb_user', [
            'email' => $email,
        ])->row_array();

        if ($user) {

            $user_token = $this->db->get_where('tb_user_token', ['token' => $token])->row_array();

            if ($user_token) {

                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {

                    $this->db->set('status_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('tb_user');

                    $this->db->delete('tb_user_token', ['email' => $email]);

                    $pesan = $this->alert('Selamat!', 'success', "$email sudah aktif. Silahkan Login!");
                    $this->session->set_flashdata('alert', $pesan);

                    redirect('auth');
                } else {

                    $this->db->delete('tb_user', ['email' => $email]);
                    $this->db->delete('tb_user_token', ['email' => $email]);

                    $pesan = $this->alert('Maaf!', 'danger', "Token sudah tidak berlaku!");
                    $this->session->set_flashdata('alert', $pesan);

                    redirect('auth');
                }
            } else {

                $pesan = $this->alert('Maaf!', 'danger', "Aktivasi akun gagal! Token salah.");
                $this->session->set_flashdata('alert', $pesan);

                redirect('auth');
            }
        } else {
            $pesan = $this->alert('Maaf!', 'danger', "Aktivasi akun gagal! Email salah.");
            $this->session->set_flashdata('alert', $pesan);

            redirect('auth');
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