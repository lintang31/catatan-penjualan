<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History Jualan</title>
    <!-- Include Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Include SweetAlert for notifications -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- Include DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
</head>

<body class="bg-gray-100 font-sans">
    <?php $this->load->view('component/sidebar_user'); ?>

    <div class="p-4 sm:ml-64">
        <div class="p-3 mt-6">
            <div
                class="w-full p-4 text-center bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                <div class="flex justify-between">
                    <h6 class="mb-2 text-xl font-bold text-gray-900 dark:text-white">History Jualan</h6>
                </div>
                <hr>

                <div class="relative overflow-x-auto mt-5">
                    <table id="datajualan" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">No</th>
                                <th scope="col" class="px-6 py-3" style="text-align: center;">Nama Barang</th>
                                <th scope="col" class="px-6 py-3" style="text-align: center;">Tanggal</th>
                                <th scope="col" class="px-6 py-3" style="text-align: center;">Jumlah Barang</th>
                                <th scope="col" class="px-6 py-3" style="text-align: center;">Harga Barang</th>
                                <th scope="col" class="px-6 py-3" style="text-align: center;">Keterangan Barang</th>
                                <th scope="col" class="px-6 py-3" style="text-align: center;">Aksi</th>
                            </tr>
                        </thead>

                        <tbody class='text-left'>
                            <?php
                               $no = 0;
                             if ($proses_penjualan !== null) {
                             foreach ($proses_penjualan as $row):
                              $no++; ?>
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <?php echo $no; ?>
                                </th>
                                <td class="px-6 py-3" style="text-align: center;"><?php echo $row->nama_barang; ?></td>
                                <td class="px-6 py-4"><?php echo $row->tanggal; ?></td>
                                <td class="px-6 py-3" style="text-align: center;"><?php echo $row->jumlah_barang; ?>
                                </td>
                                <td class="px-6 py-3" style="text-align: center;"><?php echo $row->harga_barang; ?></td>
                                <td class="px-6 py-3" style="text-align: center;"><?php echo $row->keterangan_barang; ?>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-center">
                                        <a type="button"
                                            href="<?= base_url('user/detail_jualan/' . $row->id_penjualan) ?>"
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full button-info mr-1">
                                            <i class="fas fa-info-circle"></i>
                                        </a>
                                        <a id="downloadPdfButton" type="button"
                                            href="<?php echo base_url('user/nota_barang/') . $row->id_penjualan; ?>"
                                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full button-print ml-1">
                                            <i class="fas fa-print"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach;
                              } else {
                             // Display a message if $proses_penjualan is null
                             echo '<tr><td colspan="7">No data available</td></tr>';
                              }
                             ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Include jQuery and DataTables scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>

    <!-- DataTables initialization script -->
    <script>
    $(document).ready(function() {
        $('#datajualan').DataTable({
            responsive: true
        });
    });
    </script>

    <!-- Other scripts, e.g., Swal (SweetAlert) for notifications -->
    <script>
    // Your other scripts go here
    </script>

    <?php if ($this->session->flashdata('berhasil_batal')) { ?>
    <script>
    Swal.fire({
        title: "Berhasil",
        text: "<?php echo $this->session->flashdata('berhasil_batal'); ?>",
        icon: "success",
        showConfirmButton: false,
        timer: 1500
    });
    </script>
    <?php } ?>

    <?php if ($this->session->flashdata('berhasil_cuti')) { ?>
    <script>
    Swal.fire({
        title: "Berhasil",
        text: "<?php echo $this->session->flashdata('berhasil_cuti'); ?>",
        icon: "success",
        showConfirmButton: false,
        timer: 1500
    });
    </script>
    <?php } ?>

    <?php if ($this->session->flashdata('gagal_cuti')) { ?>
    <script>
    Swal.fire({
        title: "Gagal",
        text: "<?php echo $this->session->flashdata('gagal_cuti'); ?>",
        icon: "error",
        showConfirmButton: false,
        timer: 1500
    });
    </script>
    <?php } ?>

    <?php if ($this->session->flashdata('gagal_batal')) { ?>
    <script>
    Swal.fire({
        title: "Gagal",
        text: "<?php echo $this->session->flashdata('gagal_batal'); ?>",
        icon: "error",
        showConfirmButton: false,
        timer: 1500
    });
    </script>
    <?php } ?>

</body>

</html>