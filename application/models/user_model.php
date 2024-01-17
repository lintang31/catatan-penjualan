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

    public function get_barang_details()
    {
        $this->db->select('*');
        $this->db->from('manajemen_produk'); // Replace 'your_table_name' with your actual table name

        // Assuming you have a column named 'id' for the product ID, replace it accordingly
        $this->db->where('id_produk', $this->input->get('id_produk')); // Adjust based on how you pass the ID

        $query = $this->db->get();

        // Check if the query was successful
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    // public function get_manajemen_produk() {
    //     // Fetch data from the database and return a single row
    //     return $this->db->get('manajemen_produk')->row(); // Replace 'manajemen_produk' with your actual table name
    // }
    
    public function get_manajemen_produk($id_produk)
    {
        // Assuming 'lokasi' is your table name
        $this->db->where('id_produk', $id_produk);
        $query = $this->db->get('manajemen_produk');

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_manajemen_produkk($id_produk)
    {
        // Assuming 'lokasi' is the table name in your database
        $query = $this->db->get_where('manajemen_produk', ['id_produk' => $id_produk]);

        // Return the result as an object
        return $query->row();
    }

    // public function get_barang_data($id_produk, $data)
    // {
    //     // Update lokasi berdasarkan id_produk
    //     $this->db->where('id_produk', $id_produk);
    //     $this->db->update('manajemen_produk', $data);
    // }

    public function hapus_barang($id_produk)
    {
        // Your deletion logic here
        $this->db->where('id_produk', $id_produk);
        $this->db->delete('manajemen_produk');
    }

    
    public function get_barang_data($id_produk) {
        // Add your logic to fetch the product data from the database based on the provided $id_produk
        // Example: Replace 'manajemen_produk' with your actual database table name
        $query = $this->db->get_where('manajemen_produk', array('id_produk' => $id_produk));
        return $query->row_array();
    }
    

    public function update_barang($id_produk, $nama_barang, $jumlah_barang, $keterangan_barang) {
        // Add your logic to update the product data in the database
        // Example: Replace 'manajemen_produk' with your actual database table name
        $data = array(
            'nama_barang' => $nama_barang,
            'jumlah_barang' => $jumlah_barang,
            'keterangan_barang' => $keterangan_barang
        );

        $this->db->where('id_produk', $id_produk);
        $this->db->update('manajemen_produk', $data);
    }
}
?>