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
}
?>