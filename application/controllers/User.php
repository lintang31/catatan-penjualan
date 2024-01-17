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
    
  // User.php
// public function update_barang($id_produk)
// {
//     // Load necessary models or helpers here
//     $this->load->model('User_model');

//     // Assuming you have a method in your model to get product details by ID using get_manajemen_produk
//     $data['manajemen_produk'] = $this->User_model->get_manajemen_produk($id_produk);

//     // Load the view for updating product details
//     $this->load->view('page/user/update_barang', $data);
// }

// public function aksi_edit_barang() {
//     // Handle the form submission here
//     $id_produk = $this->input->post('id_produk');
//     $nama_barang = $this->input->post('nama_barang');
//     $jumlah_barang = $this->input->post('jumlah_barang');
//     $keterangan_barang = $this->input->post('keterangan_barang');

//     // Perform validation if needed

//     // Update the data in the database
//     $data = array(
//         'nama_barang' => $nama_barang,
//         'jumlah_barang' => $jumlah_barang,
//         'keterangan_barang' => $keterangan_barang
//         // Add other fields if needed
//     );

//     $this->User_model->update_barang($id_produk, $data);

//     // Redirect to the desired page after successful update
//     redirect('user/update_barang/'.$id_produk); // Change 'user/index' to your desired page
// }

 // aksi hapus lokasi
 public function hapus_barang($id_lokasi)
 {
     $this->User_model->hapus_barang($id_lokasi); // Assuming you have a method 'hapus_barang' in the model
     redirect('user/manajemen_produk');
     $this->session->set_flashdata('hapus_barang');
 }

 public function update_barang($id_produk) {
    // Add any logic you need before loading the view
    $data['manajemen_produk'] = $this->User_model->get_barang_data($id_produk); // Replace 'Your_model_name' with your actual model name

    // Load the view with the necessary data
    $this->load->view('page/user/update_barang', $data);
}

public function aksi_edit_barang() {
    // Validate the form data (add validation rules as needed)

    // Get the form data
    $id_produk = $this->input->post('id_produk');
    $nama_barang = $this->input->post('nama_barang');
    $jumlah_barang = $this->input->post('jumlah_barang');
    $keterangan_barang = $this->input->post('keterangan_barang');

    // Update the data in your model (replace 'Your_model_name' with your actual model name)
    $this->User_model->update_barang($id_produk, $nama_barang, $jumlah_barang, $keterangan_barang);

    // Redirect or display a success message
    redirect('user/manajemen_produk'); // Redirect to the edit_barang method
}


    }