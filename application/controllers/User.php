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
        $this->load->helper('user_helper'); // Sesuaikan dengan nama model Anda
    }
    public function index()
    {
        $id_user = $this->session->userdata('id');
        $data['user_count'] = $this->User_model->get_user_count();
        $data['user'] = $this->User_model->get_user_data();
        $data['sales_history'] = $this->User_model->get_sales_history();
        $data['product_count'] = $this->User_model->getProductsCount(); // Fetch the count
        $data['history_count'] = $this->User_model->getHistoryCount();

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
        $data['tanggal_sekarang'] = date('Y-m-d'); // Mendapatkan tanggal sekarang
        $this->load->view('page/user/tambah_barang', $data);
    }
    
    private function process_tambah_barang() {
        // Process the form data here (e.g., save to the database)
    
        // For example, assuming you have a model named Some_model
        $this->load->model('User_model');
        
        $data = array(
            'nama_barang' => $this->input->post('nama_barang'),
            'jumlah_barang' => $this->input->post('jumlah_barang'),
            'harga_barang' => $this->input->post('harga_barang'),
            'keterangan_barang' => $this->input->post('keterangan_barang'),
            'tanggal' => $this->input->post('tanggal') // Menggunakan tanggal dari form, atau bisa diganti dengan tanggal saat ini
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

    // Tambahkan kolom tanggal dengan timestamp saat ini
    $tanggal = date('Y-m-d H:i:s');

    // Masukkan data ke dalam database
    $data = [
        'id_penjualan' => $id_penjualan,
        'nama_barang' => $nama_barang,
        'jumlah_barang' => $jumlah_barang,
        'harga_barang' => $harga_barang,
        'keterangan_barang' => $keterangan_barang,
        'tanggal' => $tanggal, // Tambahkan kolom tanggal
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

public function nota_barang($id_penjualan) {
    // Assuming you have a model or other logic to get data
    $proses_penjualan = $this->User_model->get_proses_penjualan_data($id_penjualan); // Replace with actual method

    // Using the model's function to get the name
    $nama_barang = $this->User_model->get_nama_barang($id_penjualan);
    $jumlah_barang = $this->User_model->get_jumlah_barang($id_penjualan);
    $harga_barang = $this->User_model->get_harga_barang($id_penjualan);
    $keterangan_barang = $this->User_model->get_keterangan_barang($id_penjualan);

    $data = array(
        'proses_penjualan' => $proses_penjualan,
        'nama_barang' => $nama_barang,
        'jumlah_barang' => $jumlah_barang,
        'harga_barang' => $harga_barang,
        'keterangan_barang' => $keterangan_barang,
    );

    $this->load->view('page/user/nota_barang', $data);
}

// Add a new function to handle the button click
public function display_barang($id_barang) {
    $this->nota_barang($id_barang);
}

// Page rekap harian
public function laporan_harian()
{
    $tanggal = $this->input->get('tanggal');
    $data['perhari'] = $this->User_model->getRekapHarian($tanggal);
    $this->load->view('page/user/laporan_harian', $data);
}


public function laporan_bulan()
{
    $bulan = $this->input->post('bulan'); // Menggunakan post karena form menggunakan method="post"
    $data['proses_penjualan'] = $this->User_model->get_bulanan($bulan);
    $this->session->set_flashdata('bulan', $bulan);
    $this->load->view('page/user/laporan_bulan', $data);
}

public function laporan_tahun()
{
    // Handle form submission
    $data['proses_penjualan'] = []; // Initialize with an empty array

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $year = $this->input->post('tahun');

        // Validate $year if needed

        // Get data for the selected year
        $data['proses_penjualan'] = $this->User_model->getYearlyReport($year);
        $this->session->set_flashdata('tahun', $year);
    } else {
        // Default to the current year
        $currentYear = date("Y");
        $this->session->set_flashdata('tahun', $currentYear);
    }

    // Load your view with the data
    $this->load->view('page/user/laporan_tahun', $data);
}




    }