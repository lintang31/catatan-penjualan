<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->model('m_model'); // Sesuaikan dengan nama model Anda
    }

    public function index()  
    {  
        $this->load->view('auth/login');  
    }  

    public function register() 
    {
        $this->load->view('auth/register');
    }

    public function aksi_login()
    {
        // Mengambil data email dan password yang dikirimkan melalui form login.
        $email = $this->input->post('email', true);
        $password = $this->input->post('password', true);

        // Mencari data pengguna di tiga tabel yang mungkin memiliki pengguna dengan alamat email yang sesuai.
        $tables = ['user'];

        foreach ($tables as $table) {
            // Membuat array $data untuk mencari pengguna berdasarkan alamat email.
            $data = [
                'email' => $email,
            ];

            // Mencari data pengguna dengan alamat email yang sesuai dalam database.
            $query = $this->m_model->getwhere($table, $data);
            // Mengambil hasil pencarian dalam bentuk array asosiatif.
            $result = $query->row_array();

            // Memeriksa apakah hasil pencarian tidak kosong dan kata sandi cocok.
            if (!empty($result) && md5($password) === $result['password']) {
                // Jika berhasil login:

                // Membuat array $data_sess untuk sesi pengguna.
                $data_sess = [
                    'logged_in' => true, // Menandakan bahwa pengguna sudah login.
                    'email' => $result['email'],
                    'username' => $result['username'],
                    'role' => $result['role'], // Menyimpan peran pengguna (admin/karyawan).
                    'image' => $result['image'],
                    'id' => $result['id_' . $table], // Mendapatkan ID pengguna dari tabel yang tepat.
                ];
                // Mengatur data sesi pengguna dengan informasi di atas.
                $this->session->set_userdata($data_sess);
                $this->session->set_flashdata(
                    'login_success',
                    'Selamat Datang Di Absensi.'
                );

                // Mengarahkan pengguna ke halaman berdasarkan peran mereka.
                redirect(base_url() . $table);
            }
        }
    }

    public function aksi_register()
    {
        $username = $this->input->post('username', true);
        $email = $this->input->post('email', true);
        $nama_depan = $this->input->post('nama_depan', true);
        $nama_belakang = $this->input->post('nama_belakang', true);
        $password = $this->input->post('password', true);
        // $id_admin = $this->m_model->get_admin_id($id_organisasi);

        // Validasi input
        if (empty($username) || empty($nama_depan) || empty($password)) {
            // Tampilkan pesan error jika ada input yang kosong
            $this->session->set_flashdata('error', 'Semua field harus diisi.');
            redirect(base_url() . 'auth/register'); // sesuaikan dengan URL halaman registrasi .
        } elseif (strlen($password) < 8) {
            $this->session->set_flashdata(
                'register_error',
                'Password minimal 8 huruf.'
            );
            redirect(base_url('auth/register'));
        } else {
            // dengan menggunakan model untuk menyimpan data pengguna
            $data = [
                'username' => $username,
                'email' => $email,
                'nama_depan' => $nama_depan,
                'nama_belakang' => $nama_belakang,
                'password' => md5($password), // Simpan kata sandi yang telah di-MD5
                // 'id_shift' => '0',
                // 'id_jabatan' => '0',
                'role' => 'user',
            ];

            // memanggil model untuk menyimpan data pengguna
            $this->m_model->tambah_data('user', $data);
            $this->session->set_flashdata(
                'register_success',
                'Registrasi berhasil, Silakan login.'
            );

            // Setelah data pengguna berhasil disimpan, dapat mengarahkan pengguna
            // ke halaman login atau halaman lain yang sesuai.
            redirect(base_url() . 'auth/index'); // sesuaikan dengan URL halaman login
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('auth'));
    }


}
?>