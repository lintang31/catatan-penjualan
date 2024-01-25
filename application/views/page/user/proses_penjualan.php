<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proses Penjualan</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        background-color: #f4f4f4;
        /* Set a background color */
    }

    .container {
        margin: 0 auto;
        max-width: 800px;
        /* Set a maximum width for the content */
        padding: 20px;
    }

    .card {
        background-color: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        padding: 20px;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin-bottom: 5px;
    }

    input {
        width: 100%;
        padding: 10px;
        box-sizing: border-box;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    button {
        background-color: #4caf50;
        color: #ffffff;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    /* Responsive styles */
    @media screen and (max-width: 600px) {
        .card {
            padding: 10px;
        }

        input {
            width: calc(100% - 20px);
        }

        button {
            width: 100%;
        }
    }
    </style>
</head>

<body>
    <?php $this->load->view('component/sidebar_user'); ?>
    <div class="p-4 sm:ml-64">
        <div class="p-5 mt-4">
            <!-- Card -->
            <div class="card">
                <div class="flex justify-between">
                    <h6 class="mb-2 text-xl font-bold text-gray-900 dark:text-white">Proses Penjualan</h6>
                </div>
                <hr class="mb-7">

                <!-- Formulir untuk permintaan izin -->
                <?php foreach ($manajemen_produk as $row): ?>
                <form action="<?php echo base_url('user/aksi_proses_penjualan'); ?>" method="post" class="text-left">
                    <div class="form-group">
                        <label for="nama_barang">Nama Barang</label>
                        <input type="text" name="nama_barang" id="nama_barang"
                            value="<?php echo isset($row->nama_barang) ? $row->nama_barang : ''; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="jumlah_barang">Jumlah Barang</label>
                        <input type="text" name="jumlah_barang" id="jumlah_barang"
                            value="<?php echo isset($row->jumlah_barang) ? $row->jumlah_barang : ''; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="harga_barang">Harga Barang</label>
                        <input type="text" name="harga_barang" id="harga_barang"
                            value="<?php echo isset($row->harga_barang) ? $row->harga_barang : ''; ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="keterangan_barang">Keterangan Barang</label>
                        <input type="text" name="keterangan_barang" id="keterangan_barang"
                            value="<?php echo isset($row->keterangan_barang) ? $row->keterangan_barang : ''; ?>"
                            required>
                    </div>
                    <div class="text-right">
                        <button type="submit"
                            style="background-color: #007BFF; color: #FFFFFF; padding: 10px 20px; border: none; border-radius: 5px;">
                            <i class="fas fa-paper-plane" style="margin-right: 5px;"></i>
                        </button>
                    </div>
                </form>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</body>

</html>