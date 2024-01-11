<?php
class User_model extends CI_Model
{
    // Menampilkan role user
    public function get_user()
    {
        $this->db->where('id_user', 'user');
        $query = $this->db->get('user');
        return $query->result();
    }

    // Mendapatkan semua data dari tabel tertentu
    function get_data($table)
    {
        return $this->db->get($table);
    }

    public function get_user_count()
    {
        $this->db->where('role', 'user');
        $query = $this->db->get('user');
        return $query->num_rows();
    }
    
    public function get_user_data()
    {
        // Fetch user data from your database table
        $query = $this->db->get('user');

        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return [];
        }
    }

    public function get_manajemen_produk_data() {
        // Replace this with your actual database query logic
        // For example, fetching data from a table named 'manajemen_produk'
        $query = $this->db->get('manajemen_produk');

        // Check if the query was successful
        if ($query) {
            // Return the result set as an array of objects
            return $query->result();
        } else {
            // Return an empty array or handle the error as needed
            return array();
        }
    }

    public function save_barang_data($data) {
        // Assuming 'Your_table_name' is the name of your table
        $this->db->insert('manajemen_produk', $data);
    }
}
?>