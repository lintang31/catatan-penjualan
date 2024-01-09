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
    
}