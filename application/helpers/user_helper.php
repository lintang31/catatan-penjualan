<?php
function tampil_barang($id)
{
    $ci = &get_instance();
    $ci->load->database();
    $result = $ci->db->where('id_produk', $id)->get('manajemen_produk');
    foreach ($result->result() as $c) {
        $stmt = $c->nama_barang;
        return $stmt;
    }

    
// Format tanggal Indonesia
function convDate($date)
{
    $bulan = [
        1 => 'Januari',
        2 => 'Februari',
        3 => 'Maret',
        4 => 'April',
        5 => 'Mei',
        6 => 'Juni',
        7 => 'Juli',
        8 => 'Agustus',
        9 => 'September',
        10 => 'Oktober',
        11 => 'November',
        12 => 'Desember',
    ];

    $tanggal = date('d', strtotime($date)); // Mengambil tanggal dari timestamp
    $bulan = $bulan[date('n', strtotime($date))]; // Mengambil bulan dalam bentuk string
    $tahun = date('Y', strtotime($date)); // Mengambil tahun dari timestamp

    return $tanggal . ' ' . $bulan . ' ' . $tahun; // Mengembalikan tanggal yang diformat
}
}
?>