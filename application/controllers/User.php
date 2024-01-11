<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->model('m_model'); // Sesuaikan dengan nama model Anda
        $this->load->model('User_model'); // Sesuaikan dengan nama model Anda
    }
    public function index()
    {
        $id_user = $this->session->userdata('id');
        $data['user_count'] = $this->User_model->get_user_count();
        $data['user'] = $this->User_model->get_user_data();

        $this->load->view('page/user/dashboard', $data);
    }

    public function profile() 
    {
        $this->load->view('page/user/profile');
    }

    public function manajemen_produk() {
        // Assuming you have some data to pass to the view
        $data['manajemen_produk'] = $this->User_model->get_manajemen_produk_data(); // Replace with your actual data retrieval logic

        $this->load->view('page/user/manajemen_produk', $data);
    }
    
    public function tambah_barang() {
        // Load form helper and validation library
        $this->load->helper('form');
        $this->load->library('form_validation');

        // Check if the form is submitted
        if ($this->input->post()) {
            // Set form validation rules
            $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
            $this->form_validation->set_rules('jumlah_barang', 'Jumlah Barang', 'required');
            $this->form_validation->set_rules('keterangan_barang', 'Keterangan Barang', 'required');

            // Run form validation
            if ($this->form_validation->run() == TRUE) {
                // If validation is successful, process the form data (save to database or perform any other action)
                $this->process_tambah_barang();
            }
        }

        // Load the "Tambah Barang" view
        $this->load->view('page/user/tambah_barang');
    }

    private function process_tambah_barang() {
        // Process the form data here (e.g., save to the database)

        // For example, assuming you have a model named Some_model
        $this->load->model('User_model');
        
        $data = array(
            'nama_barang' => $this->input->post('nama_barang'),
            'jumlah_barang' => $this->input->post('jumlah_barang'),
            'keterangan_barang' => $this->input->post('keterangan_barang')
        );

        // Save data to the database using the model
        $this->User_model->save_barang_data($data);

        // Redirect to a success page or perform any other actions after successful data processing
        redirect('user/manajemen_produk');
    }

    // Add other methods or functions as needed

    

    }