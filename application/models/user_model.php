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

    public function tambah_data($tabel, $data)
    {
        // Masukkan data ke dalam tabel
        $this->db->insert($tabel, $data);
    }

    public function get_penjualan_data_byuser($id_penjualan)
    {
        // Lakukan query atau operasi lain untuk mendapatkan data penjualan berdasarkan id_penjualan
        // ...
    
        // Contoh query menggunakan Active Record
        $this->db->select('*');
        $this->db->from('proses_penjualan');
        $this->db->where('id_penjualan', $id_penjualan); // Perubahan pada bagian ini
        $query = $this->db->get();
    
        return $query->result();
    }


    public function get_penjualan_data_by_id($id_penjualan)
    {
        // Retrieve penjualan data based on the provided ID
        $this->db->where('id_penjualan', $id_penjualan);
        $query = $this->db->get('proses_penjualan');

        // Check if there is a result
        if ($query->num_rows() > 0) {
            return $query->row_array(); // Return the result as an associative array
        } else {
            return null; // Return null if no result is found
        }
    }
    
    public function getPenjualanData() {
        // Example query to get data from the 'penjualan' table
        $query = $this->db->get('proses_penjualan');
        return $query->result(); // Returns an array of objects
    }
    
    public function get_dataa($id_penjualan) {
        // Assuming you have a table named 'proses_penjualan' and a column named 'id' as the item identifier, adjust accordingly
        $this->db->where('id_penjualan', $id_penjualan);
        $query = $this->db->get('proses_penjualan');
    
        // Check if the query was successful
        if ($query->num_rows() > 0) {
            // Return the result as an array of objects for the specific item
            return $query->result();
        } else {
            return false;
        }
    }

    public function get_manajemen_produk_data() {
        // Replace this with your actual database query logic
        // For example, fetching data from a table named 'manajemen_produk' with a specific ID
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

    public function get_manajemen_produk_dataa($id_produk) {
        // Replace this with your actual database query logic
        // For example, fetching data from a table named 'manajemen_produk' with a specific ID
        $this->db->where('id_produk', $id_produk);
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

    public function get_proses_penjualan_data($id_penjualan) {
        // Replace 'your_proses_penjualan_table' with the actual table name
        $this->db->select('*')->from('proses_penjualan')->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row();
        }

        return null;
    }
    
    public function get_nama_barang($id_penjualan) {
        // Replace the following line with your actual database query or data retrieval logic
        // Assuming you have a table named 'barang' with a column 'nama_barang'
        $query = $this->db->get_where('proses_penjualan', array('id_penjualan' => $id_penjualan));
        $result = $query->row();

        if ($result) {
            return $result->nama_barang;
        } else {
            return 'Nama Barang Not Found';
        }
    }

    public function get_jumlah_barang($id_penjualan) {
        // Replace the following line with your actual database query or data retrieval logic
        // Assuming you have a table named 'barang' with a column 'jumlah_barang'
        $query = $this->db->get_where('proses_penjualan', array('id_penjualan' => $id_penjualan));
        $result = $query->row();

        if ($result) {
            return $result->jumlah_barang;
        } else {
            return 'Jumlah Barang Not Found';
        }
    }

    public function get_harga_barang($id_penjualan) {
        // Replace the following line with your actual database query or data retrieval logic
        // Assuming you have a table named 'barang' with a column 'harga_barang'
        $query = $this->db->get_where('proses_penjualan', array('id_penjualan' => $id_penjualan));
        $result = $query->row();

        if ($result) {
            return $result->harga_barang;
        } else {
            return 'Harga Barang Not Found';
        }
    }

    public function get_keterangan_barang($id_penjualan) {
        // Replace the following line with your actual database query or data retrieval logic
        // Assuming you have a table named 'barang' with a column 'keterangan_barang'
        $query = $this->db->get_where('proses_penjualan', array('id_penjualan' => $id_penjualan));
        $result = $query->row();

        if ($result) {
            return $result->keterangan_barang;
        } else {
            return 'Keterangan Barang Not Found';
        }
    }

    // Modify your model
public function get_sales_history() {
    // Replace 'sales_history_table' with the actual table name where you store your sales history data
    $query = $this->db->get('proses_penjualan');

    return $query->result(); // Assuming you want to return an array of objects
}

public function getRekapHarian($tanggal)
{
    // Gantilah 'nama_tabel' dengan nama tabel yang sesuai di database Anda
    $this->db->select('*');
    $this->db->from('proses_penjualan as a'); // Memberikan alias 'a' pada tabel absensi
    $this->db->where('a.tanggal', $tanggal);

    $query = $this->db->get();

    return $query->result();
    // Mengembalikan array kosong jika tidak ada data yang ditemukan
}

public function get_bulanan($date)
{
    $this->db->from('proses_penjualan');
    $this->db->where("DATE_FORMAT(proses_penjualan.tanggal, '%m') =", $date);
    $query = $this->db->get();
    return $query->result();
}

public function get_proses_penjualan_dataa() {
    // Assuming you have a database table named 'proses_penjualan'
    $query = $this->db->get('proses_penjualan');

    // Check if there are any rows
    if ($query->num_rows() > 0) {
        return $query->result();
    } else {
        return array(); // Return an empty array if no data is found
    }
}

public function getYearlyReport($year)
{
    // Assuming your table name is 'proses_penjualan'
    $this->db->select('*');
    $this->db->from('proses_penjualan');
    $this->db->where('YEAR(tanggal)', $year);
    $query = $this->db->get();

    return $query->result();
}


public function getDailyReport($tanggal) {
    // Adjust the table name according to your database structure
    $this->db->where('tanggal', $tanggal);
    $query = $this->db->get('proses_penjualan'); // Replace 'your_table_name' with your actual table name

    return $query->result();
}

public function getProductsCount() {
    return $this->db->count_all('manajemen_produk'); // Replace 'your_product_table' with your actual table name
}

public function getHistoryCount() {
    return $this->db->count_all('proses_penjualan'); // Replace 'your_history_table' with your actual history table name
}


}
?>