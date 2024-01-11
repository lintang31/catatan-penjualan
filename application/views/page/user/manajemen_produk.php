<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Produk</title>
</head>

<body>
    <?php $this->load->view('component/sidebar_user'); ?>
    <div class="p-4 sm:ml-64">
        <div class="p-5 mt-10">
            <!-- Card -->
            <div
                class="w-full p-4 text-center bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                <div class="flex justify-between">
                    <h6 class="mb-2 text-xl font-bold text-gray-900 dark:text-white">Data Barang</h6>
                    <a type="button" href="<?php echo base_url(
                        'user/tambah_barang'
                    ); ?>"
                        class="text-white bg-indigo-500 hover:bg-indigo-800 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-indigo-600 dark:hover:bg-indigo-700 focus:outline-none dark:focus:ring-indigo-800"><i
                            class="fa-solid fa-plus"></i></a>
                </div>
                <hr>

                <!-- Tabel -->
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5">
                    <table class="w-full text-center text-sm text-left text-gray-500 dark:text-gray-400">

                        <!-- Tabel Head -->
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    No
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nama Barang
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Jumlah Barang
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Keterangan Barang
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    aksi
                                </th>
                            </tr>
                        </thead>
                        <!-- Tabel Body -->
                        <?php
                        $no = 0;
                        foreach ($manajemen_produk as $data):
                            $no++; ?>
                        <tr
                            class="text-center bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4"> <?php echo $no; ?>
                            <td class="px-6 py-4"><?php echo isset(
                                $data->nama_barang
                            )
                                ? $data->nama_barang
                                : ''; ?>
                            </td>
                            <td class="px-6 py-4"><?php echo isset(
                                $data->jumlah_barang
                            )
                                ? $data->jumlah_barang
                                : ''; ?></td>
                            <td class="px-6 py-4"><?php echo isset(
                                $data->keterangan_barang
                            )
                                ? $data->keterangan_barang
                                : ''; ?></td>

                            <td class="px-6 py-4">
                                <div class="flex justify-center">
                                    <a type="button" href="<?= base_url(
                                        'admin/detail_lokasi/' .
                                            $data->id_produk
                                    ) ?>"
                                        class="text-white bg-indigo-500 hover:bg-indigo-800 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 mx-1 py-2.5 mr-2 mb-2 dark:bg-indigo-600 dark:hover:bg-indigo-700 focus:outline-none dark:focus:ring-indigo-800">
                                        <i class="fa-solid fa-circle-info"></i>
                                    </a>
                                    <a type="button" href="<?php echo base_url(
                                            'admin/update_lokasi/' .
                                                $data->id_produk
                                        ); ?>"
                                        class="text-white bg-yellow-400 hover:bg-indigo-800 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-indigo-600 dark:hover:bg-indigo-700 focus:outline-none dark:focus:ring-indigo-800">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <a href="javascript:void(0);"
                                        onclick="hapusLokasi('<?php echo $data->id_produk; ?>')"
                                        class="text-white bg-red-600 hover:bg-indigo-800 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-indigo-600 dark:hover:bg-indigo-700 focus:outline-none dark:focus:ring-indigo-800">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>

                                </div>
                            </td>

                        </tr>
                        <?php
                        endforeach;
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
function hapusLokasi(idLokasi) {
    Swal.fire({
        title: 'Apakah Anda yakin?',
        text: 'Data lokasi beserta karyawan yang terkait akan dihapus!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            // Contoh SweetAlert berhasil (gantilah ini dengan respons server sebenarnya)
            Swal.fire({
                title: 'Berhasil!',
                text: 'Data lokasi berhasil dihapus.',
                icon: 'success',
                timer: 1500, // Waktu dalam milidetik sebelum SweetAlert ditutup secara otomatis (1.5 detik dalam contoh ini)
                showConfirmButton: false // Menyembunyikan tombol OK
            }).then(() => {
                // Redirect atau lakukan tindakan lain setelah penghapusan berhasil
                window.location.href = "<?php echo base_url('admin/hapus_lokasi/'); ?>" + idLokasi;
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

</html>