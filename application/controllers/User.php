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
            $this->form_validation->set_rules('harga_barang', 'Harga barang', 'required');
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
            'harga_barang' => $this->input->post('harga_barang'),
            'keterangan_barang' => $this->input->post('keterangan_barang')
        );

        // Save data to the database using the model
        $this->User_model->save_barang_data($data);

        // Redirect to a success page or perform any other actions after successful data processing
        redirect('user/manajemen_produk');
    }


    public function detail_barang($id_produk)
    {
        // Menggunakan fungsi get_manajemen_produk untuk mendapatkan data lokasi
        $data['manajemen_produk'] = $this->User_model->get_manajemen_produk($id_produk);
    
        // Mengirim data lokasi ke view
        $this->load->view('page/user/detail_barang', $data);
    }
    

 // aksi hapus lokasi
 public function hapus_barang($id_lokasi)
 {
     $this->User_model->hapus_barang($id_lokasi); // Assuming you have a method 'hapus_barang' in the model
     redirect('user/manajemen_produk');
     $this->session->set_flashdata('hapus_barang');
 }

public function proses_penjualan($id_produk) 
{

    $data['manajemen_produk'] = $this->User_model->get_manajemen_produk_dataa($id_produk); // Replace with your actual data retrieval logic
    $this->load->view('page/user/proses_penjualan', $data);
}

public function aksi_proses_penjualan()
{
    // Generate ID penjualan using timestamp
    $id_penjualan = 'JL' . date('YmdHis');

    // Ambil data dari formulir
    $nama_barang = $this->input->post('nama_barang');
    $jumlah_barang = $this->input->post('jumlah_barang');
    $harga_barang = $this->input->post('harga_barang');
    $keterangan_barang = $this->input->post('keterangan_barang');

    // Masukkan data ke dalam database
    $data = [
        'id_penjualan' => $id_penjualan,
        'nama_barang' => $nama_barang,
        'jumlah_barang' => $jumlah_barang,
        'harga_barang' => $harga_barang,
        'keterangan_barang' => $keterangan_barang,
        // tambahkan kolom lain sesuai kebutuhan
    ];

    // Panggil model untuk menyimpan data
    $this->User_model->tambah_data('proses_penjualan', $data);

    // Set pesan sukses
    $this->session->set_flashdata('berhasil', 'Data penjualan berhasil ditambahkan.');

    // Set the ID penjualan in session
    $this->session->set_userdata('id_penjualan', $id_penjualan);

    // Redirect ke halaman histori penjualan
    redirect('user/history_jualan');
}

public function history_jualan() {
    // Load the Penjualan_model
    $this->load->model('User_model');

    // Get data from the model
    $data['proses_penjualan'] = $this->User_model->getPenjualanData();

    // Load the view with data
    $this->load->view('page/user/history_jualan', $data);
}

public function detail_jualan($id_penjualan) {
    // Load the necessary model here and get data for the specified item ID
    $this->load->model('User_model');
    $proses_penjualan_data = $this->User_model->get_dataa($id_penjualan); // Modify the model method to accept and use $item_id

    // Check if the data is found
    if ($proses_penjualan_data) {
        // Pass data to the view
        $data['proses_penjualan'] = $proses_penjualan_data;

        // Load the view
        $this->load->view('page/user/detail_jualan', $data);
    } else {
        // Handle the case where the data for the specified item ID is not found
        // For example, you can redirect to an error page or display an error message
        echo "Item not found"; // Modify this part based on your error handling logic
    }
}



    }