<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Barang</title>
</head>
<style>
/* Add your responsive styles here */
body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Responsive styles for the container */
.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

/* Responsive styles for the form */
.form-container {
    max-width: 600px;
    margin: 0 auto;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Responsive styles for input fields */
.form-group {
    margin-bottom: 15px;
}

/* Responsive styles for buttons */
.btn {
    display: inline-block;
    padding: 10px 20px;
    font-size: 16px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.btn-back {
    background-color: #e74c3c;
    color: #fff;
}

.btn-save {
    background-color: #3498db;
    color: #fff;
}

/* Add more responsive styles as needed */
</style>

<body>
    <?php $this->load->view('component/sidebar_user'); ?>
    <div class="p-4 sm:ml-64">
        <div class="p-5 mt-10">
            <!-- Card -->
            <div
                class="w-full p-4 text-center bg-white border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                <!-- Header -->
                <div class="flex justify-between">
                    <h6 class="mb-2 text-xl font-bold text-gray-900 dark:text-white">Tambah Barang</h6>
                </div>
                <hr>
                <div class="mt-5 text-left">
                    <form method="post" action="<?php echo site_url('user/tambah_barang'); ?>">
                        <!-- Form Input -->
                        <div class="grid md:grid-cols-2 md:gap-6">
                            <!-- Nama Lokasi Input -->
                            <div class="relative z-0 w-full mb-6 group">
                                <input type="text" name="nama_barang" id="nama_barang"
                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" " autocomplete="off"
                                    value="<?php echo isset($nama_barang) ? $nama_barang : ''; ?>" required />
                                <label for="nama_barang"
                                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                    Nama Barang
                                </label>
                            </div>

                            <div class="relative z-0 w-full mb-6 group">
                                <input type="text" name="jumlah_barang" id="jumlah_barang"
                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" " autocomplete="off" pattern="[0-9]+"
                                    title="Please enter a valid numeric value"
                                    value="<?php echo isset($jumlah_barang) ? $jumlah_barang : ''; ?>" required />
                                <label for="jumlah_barang"
                                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                    Jumlah Barang
                                </label>
                            </div>


                            <div class="relative z-0 w-full mb-6 group">
                                <input type="text" name="harga_barang" id="harga_barang"
                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" " autocomplete="off" oninput="formatCurrency(this)"
                                    value="<?php echo isset($harga_barang) ? number_format($harga_barang) : ''; ?>"
                                    required />
                                <label for="harga_barang"
                                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                    Harga Barang
                                </label>
                            </div>


                            <div class="relative z-0 w-full mb-6 group">
                                <input type="text" name="keterangan_barang" id="keterangan_barang"
                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" " autocomplete="off"
                                    value="<?php echo isset($keterangan_barang) ? $keterangan_barang : ''; ?>"
                                    required />
                                <label for="keterangan_barang"
                                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                                    Keterangan Barang
                                </label>
                            </div>
                        </div>


                        <!-- Button -->
                        <div class="flex justify-between">
                            <a class="focus:outline-none text-white bg-red-500 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
                                href="javascript:history.go(-1)"><i class="fa-solid fa-arrow-left"></i> Back</a>
                            <button type="submit"
                                class="text-white bg-indigo-500 hover:bg-indigo-800 focus:ring-4 focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-indigo-600 dark:hover:bg-indigo-700 focus:outline-none dark:focus:ring-indigo-800"><i
                                    class="fa-solid fa-floppy-disk"></i> Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
function formatCurrency(input) {
    // Remove non-numeric characters
    const numericValue = input.value.replace(/[^0-9]/g, '');

    // Format the numeric value with commas
    const formattedValue = new Intl.NumberFormat('id-ID').format(numericValue);

    // Update the input value with the formatted value
    input.value = formattedValue;
}
</script>
<script>
function showPassword() {
    var passwordInput = document.getElementById("password");
    var showPassCheckbox = document.getElementById("showpass");
    if (showPassCheckbox.checked) {
        passwordInput.type = "text";
    } else {
        passwordInput.type = "password";
    }
}
</script>

</html>