<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .header {
        text-align: center;
        margin-bottom: 20px;
        padding: 20px;
        background-color: #f0f0f0;
    }

    .logo {
        width: 100px;
        height: auto;
    }

    .content {
        text-align: center;
        margin: 20px;
    }

    .content p {
        margin: 10px 0;
    }

    .footer {
        text-align: center;
        padding: 10px;
        background-color: #f0f0f0;
    }

    .back-button {
        margin-top: 20px;
        padding: 10px;
        background-color: #007bff;
        color: #fff;
        text-decoration: none;
        border: none;
        cursor: pointer;
    }

    .card {
        border: 1px solid #ddd;
        border-radius: 8px;
        background-color: white;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card-title {
        font-size: 1.5em;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .grid-container {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 20px;
    }

    .sales-history-card {
        max-height: 400px;
        overflow-y: auto;
        background-color: #f0f0f0;
        color: #333;
    }
    </style>
</head>

<body>
    <?php $this->load->view('component/sidebar_user'); ?>
    <div class="p-2 sm:ml-64">
        <!-- Card Selamat Datang -->
        <div class="mt-10 w-full">
            <div
                class="p-4 text-center bg-gray-200 border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                <?php
                    date_default_timezone_set('UTC');
                    $currentDateTime = new DateTime();
                    $currentDateTime->setTimezone(new DateTimeZone('Asia/Jakarta'));
                    $date = $currentDateTime->format('l, d F Y');
                    $timeWIB = $currentDateTime->format('H:i');
                ?>

                <h2 class="text-2xl font-semibold mb-4">Selamat Datang
                    <span><?php echo $this->session->userdata('username'); ?></span>
                </h2>
                <p class="text-gray-600">Selamat datang di aplikasi Penjualan,</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-5">
            <!-- Add your grid content here -->
        </div>
        <div class="p-2 mt-5 flex items-center justify-center">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-5 w-full max-w-screen-lg mx-auto">
                <a href="<?= base_url('user/manajemen_produk') ?>"
                    class="w-full p-4 text-center bg-red-400 border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                    <h5 class="mb-2 text-3xl font-bold text-gray-900 dark:text-white">Barang Produk</h5>
                    <hr class="mb-4 border-gray-900">
                    <div class="flex justify-between">
                        <p class="mb-5 text-base text-gray-500 sm:text-lg dark:text-gray-400"></p>
                        <div>
                            <i class="fa-solid fa-cube fa-fw fa-lg me-3 fa-2xl"></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>


        <!-- Sales History Section -->
        <div class="card sales-history-card">
            <h2 class="card-title">History Penjualan</h2>
            <div class="grid-container">
                <?php
                if ($sales_history !== null) :
                    foreach ($sales_history as $sale) :
                ?>
                <div class="card">
                    <h4 class="text-lg font-semibold mb-2"><?= $sale->nama_barang; ?></h4>
                    <p>Jumlah Barang: <?= $sale->jumlah_barang; ?></p>
                    <p>Harga Barang: <?= $sale->harga_barang; ?></p>
                    <p>Keterangan Barang: <?= $sale->keterangan_barang; ?></p>
                </div>
                <?php
                    endforeach;
                else :
                    ?>
                <p>No sales history available</p>
                <?php
                endif;
                ?>
            </div>
        </div>
    </div>
    </div>
    </div>

    <script>
    function validatePulang() {
        const currentHour = new Date().getHours();

        if (currentHour < 16) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Belum waktunya pulang!',
            });
        } else {
            window.location.href = '<?= base_url('user/pulang') ?>';
        }
    }
    </script>

    <?php if ($this->session->flashdata('login_success')) { ?>
    <script>
    Swal.fire({
        title: 'Berhasil Login',
        text: '<?php echo $this->session->flashdata('login_success'); ?>',
        icon: 'success',
        showConfirmButton: false,
        timer: 1500
    })
    </script>
    <?php } ?>

</body>

</html>