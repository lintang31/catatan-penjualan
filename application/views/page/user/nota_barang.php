<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota Pdf</title>
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
    </style>
</head>

<body>

    <div class="header">
        <h1>NOTA BARANG</h1>
        <hr>
    </div>

    <div class="content">
        <p>TOKO SERBA ADA</p>
        <p>Dengan hormat, ini nota penjualan dari kami</p>

        <p><strong>Nama Barang:</strong> <?php echo $nama_barang; ?></p>
        <p><strong>Jumlah Barang:</strong> <?php echo $jumlah_barang; ?></p>
        <p><strong>Harga Barang:</strong> <?php echo $harga_barang; ?></p>
        <p><strong>Keterangan Barang:</strong> <?php echo $keterangan_barang; ?></p>

        <h3>Terima Kasih Sudah Membeli Di Toko Kami</h3>

        <a href="#" class="back-button" onclick="goBack()">Kembali</a>
    </div>

    <div class="footer">
        <p>&copy; 2024 Toko Serba Ada.</p>
    </div>

    <script>
    function goBack() {
        window.history.back();
    }
    </script>

</body>

</html>