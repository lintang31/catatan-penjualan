<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Produk</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>

<body class="bg-gray-100 font-sans">
    <?php $this->load->view('component/sidebar_user'); ?>
    <div class="p-4 sm:ml-64">
        <div class="p-1 mt-3">
            <!-- Card -->
            <div
                class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                <div class="flex justify-between items-center">
                    <h6 class="text-xl font-bold text-gray-900 dark:text-white">Data Barang</h6>
                    <a href="<?php echo base_url('user/tambah_barang'); ?>" class="btn btn-success">
                        <i class="fa-solid fa-plus"></i>
                    </a>
                </div>
                <hr>

                <!-- Tabel -->
                <div class="relative overflow-x-auto mt-4">
                    <table id="dataTable" class="w-full table table-bordered table-hover text-center">
                        <!-- Tabel Head -->
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th>No</th>
                                <th scope="col" class="px-6 py-3" style="text-align: center;">Nama Barang</th>
                                <th scope="col" class="px-6 py-3" style="text-align: center;">Jumlah Barang</th>
                                <th scope="col" class="px-6 py-3" style="text-align: center;">Harga Barang</th>
                                <th scope="col" class="px-6 py-3" style="text-align: center;">Keterangan Barang</th>
                                <th scope="col" class="px-6 py-3" style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <!-- Tabel Body -->
                        <?php
                        $no = 0;
                        foreach ($manajemen_produk as $data):
                            $no++; ?>
                        <tr class="bg-white dark:bg-gray-800">
                            <td><?php echo $no; ?></td>
                            <td><?php echo isset($data->nama_barang) ? $data->nama_barang : ''; ?></td>
                            <td><?php echo isset($data->jumlah_barang) ? $data->jumlah_barang : ''; ?></td>
                            <td><?php echo isset($data->harga_barang) ? $data->harga_barang : ''; ?></td>
                            <td><?php echo isset($data->keterangan_barang) ? $data->keterangan_barang : ''; ?></td>
                            <td>
                                <div class="flex justify-center space-x-2">
                                    <a href="<?= base_url('user/detail_barang/' . $data->id_produk) ?>"
                                        class="btn btn-info"><i class="fas fa-info-circle"></i> </a>
                                    <a href="javascript:void(0);"
                                        onclick="hapusLokasi('<?php echo $data->id_produk; ?>')"
                                        class="btn btn-danger"><i class="fas fa-trash"></i> </a>
                                    <a href="<?php echo base_url('user/proses_penjualan/' . $data->id_produk); ?>"
                                        class="btn btn-warning"><i class="fas fa-arrow-alt-circle-right"></i> </a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- DataTables initialization script -->
    <script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            responsive: true
        });
    });

    function hapusLokasi(idLokasi) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: 'Data Produk yang terkait akan dihapus!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Berhasil!',
                    text: 'Data Produk berhasil dihapus.',
                    icon: 'success',
                    timer: 1500,
                    showConfirmButton: false
                }).then(() => {
                    window.location.href = "<?php echo base_url('user/hapus_barang/'); ?>" + idLokasi;
                });
            }
        });
    }
    </script>

    <?php if ($this->session->flashdata('berhasil_update')) { ?>
    <script>
    Swal.fire({
        title: "Berhasil",
        text: "<?php echo $this->session->flashdata('berhasil_update'); ?>",
        icon: "success",
        showConfirmButton: false,
        timer: 1500
    });
    </script>
    <?php } ?>

    <?php if ($this->session->flashdata('berhasil_tambah')) { ?>
    <script>
    Swal.fire({
        title: "Berhasil",
        text: "<?php echo $this->session->flashdata('berhasil_tambah'); ?>",
        icon: "success",
        showConfirmButton: false,
        timer: 1500
    });
    </script>
    <?php } ?>
</body>

</html>