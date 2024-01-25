<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Barang</title>
    <!-- Include Tailwind CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>

<body class="bg-gray-100 dark:bg-gray-900">

    <?php $this->load->view('component/sidebar_user'); ?>

    <div class="p-4 sm:ml-64">
        <div class="p-3 mt-6">

            <!-- Card -->
            <div
                class="w-full p-4 text-center bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                <div class="flex justify-between">
                    <h6 class="mb-2 text-xl font-bold text-gray-900 dark:text-white">Detail Barang</h6>
                </div>

                <hr>
                <br>

                <!-- GET Data dan ID -->

                <div class="mt-5 text-left">
                    <?php foreach ($manajemen_produk as $manajemen_produk): ?>
                    <!-- Form Input -->
                    <form action="<?php echo base_url(''); ?>" method="post" enctype="multipart/form-data">
                        <!-- Nama & Alamat Input -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="mb-6">
                                <label for="nama_barang"
                                    class="block text-sm font-medium text-gray-700 dark:text-white">
                                    Nama Barang
                                </label>
                                <input type="text" name="nama_barang" id="nama_barang"
                                    value="<?php echo $manajemen_produk->nama_barang; ?>"
                                    class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-300 dark:bg-gray-800 dark:border-gray-600 dark:text-white"
                                    placeholder="Nama Barang" autocomplete="off" required readonly />
                            </div>
                            <div class="mb-6">
                                <label for="jumlah_barang"
                                    class="block text-sm font-medium text-gray-700 dark:text-white">
                                    Jumlah Barang
                                </label>
                                <input type="text" name="jumlah_barang" id="jumlah_barang"
                                    value="<?php echo $manajemen_produk->jumlah_barang; ?>"
                                    class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-300 dark:bg-gray-800 dark:border-gray-600 dark:text-white"
                                    placeholder="Jumlah Barang" autocomplete="off" required readonly />
                            </div>
                            <div class="mb-6">
                                <label for="harga_barang"
                                    class="block text-sm font-medium text-gray-700 dark:text-white">
                                    Harga Barang
                                </label>
                                <input type="text" name="harga_barang" id="harga_barang"
                                    value="<?php echo $manajemen_produk->harga_barang; ?>"
                                    class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-300 dark:bg-gray-800 dark:border-gray-600 dark:text-white"
                                    placeholder="Harga Barang" autocomplete="off" required readonly />
                            </div>
                            <div class="mb-6">
                                <label for="keterangan_barang"
                                    class="block text-sm font-medium text-gray-700 dark:text-white">
                                    Keterangan Barang
                                </label>
                                <input type="text" name="keterangan_barang" id="keterangan_barang"
                                    value="<?php echo $manajemen_produk->keterangan_barang; ?>"
                                    class="mt-1 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-300 dark:bg-gray-800 dark:border-gray-600 dark:text-white"
                                    placeholder="Keterangan Barang" autocomplete="off" required readonly />
                            </div>
                        </div>

                        <!-- Button -->
                        <div class="flex justify-between">
                            <a href="javascript:history.go(-1)"
                                class="btn-red focus:outline-none hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:hover:bg-red-700 dark:focus:ring-red-900 dark:bg-red-600 dark:text-white">
                                <i class="fa-solid fa-arrow-left"></i> Back
                            </a>
                        </div>
                    </form>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>