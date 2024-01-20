<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proses Penjualan</title>
</head>

<body>
    <?php $this->load->view('component/sidebar_user'); ?>
    <div class="p-4 sm:ml-64">
        <div class="p-5 mt-10">
            <!-- Card -->
            <div
                class="w-full p-4 text-center bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                <div class="flex justify-between">
                    <h6 class="mb-2 text-xl font-bold text-gray-900 dark:text-white">Proses Penjualan</h6>
                </div>
                <hr class="mb-7">

                <!-- Formulir untuk permintaan izin -->
                <?php foreach ($manajemen_produk as $row): ?>
                <form action="<?php echo base_url(
                    'user/aksi_proses_penjualan'
                ); ?>" method="post" class="text-left">

                    <div class="grid md:grid-cols-2 md:gap-6">
                        <!-- Nama Lokasi Input -->
                        <div class="relative z-0 w-full mb-6 group">
                            <input type="text" name="nama_barang" id="nama_barang"
                                value="<?php echo isset($row->nama_barang) ? $row->nama_barang : ''; ?>"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " autocomplete="off" list="list_nama_barang">
                            <label for="nama_barang"
                                class=" absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                Nama Barang
                            </label>
                        </div>

                        <div class="relative z-0 w-full mb-6 group">
                            <input type="text" name="jumlah_barang" id="jumlah_barang"
                                value="<?php echo isset($row->jumlah_barang) ? $row->jumlah_barang : ''; ?>"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " autocomplete="off" list="list_jumlah_barang">

                            <label for="jumlah_barang"
                                class=" absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                Jumlah Barang
                            </label>
                        </div>

                        <div class="relative z-0 w-full mb-6 group">
                            <input type="text" name="harga_barang" id="harga_barang"
                                value="<?php echo isset($row->harga_barang) ? $row->harga_barang : ''; ?>"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " autocomplete="off" list="list_harga_barang">



                            <label for="harga_barang"
                                class=" absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                Harga Barang
                            </label>
                        </div>

                        <div class="relative z-0 w-full mb-6 group">
                            <input type="text" name="keterangan_barang" id="keterangan_barang"
                                value="<?php echo isset($row->keterangan_barang) ? $row->keterangan_barang : ''; ?>"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder=" " autocomplete="off" list="list_keterangan_barang">

                            <label for="keterangan_barang"
                                class=" absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                Keterangan Barang
                            </label>
                        </div>

                        <br>

                        <!-- Tombol Izin -->
                        <div class="text-right">
                            <button type="submit"
                                class="bg-indigo-500 hover:bg-indigo500 text-white py-2 px-4 rounded-md"><i
                                    class="fa-solid fa-paper-plane"></i></button>
                        </div>
                </form>
                <?php endforeach ?>
            </div>
        </div>
</body>

</html>