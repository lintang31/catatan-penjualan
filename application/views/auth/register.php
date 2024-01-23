<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.4.2/zxcvbn.js"></script>
</head>

<body class="h-screen" style="overflow-x: hidden;">
    <div class="min-h-screen min-w-screen w-screen bg-orange-500 flex items-center justify-center px-5 py-5">
        <div class="bg-orange-600 text-orange-300 rounded-3xl shadow-xl w-full overflow-hidden max-w-md">
            <!-- Register form -->
            <div class="w-full py-10 px-5">
                <div class="text-center mb-5">
                    <h1 class="font-bold text-3xl text-white">Registrasi</h1>
                </div>
                <form class="mt-7" action="<?php echo base_url('auth/aksi_register'); ?>" method="post">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <!-- Nama depan & belakang -->
                        <div class="w-full">
                            <label for="" class="text-xs font-semibold px-1">Nama Depan</label>
                            <div class="flex items-center">
                                <div
                                    class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                    <i class="fa-solid fa-address-card"></i>
                                </div>
                                <input type="text" name="nama_depan" autocomplete="off" required
                                    class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-orange-700 outline-none focus:border-indigo-500"
                                    placeholder="Nama Depan">
                            </div>
                        </div>
                        <div class="w-full">
                            <label for="" class="text-xs font-semibold px-1">Nama Belakang</label>
                            <div class="flex items-center">
                                <div
                                    class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                    <i class="fa-solid fa-address-card"></i>
                                </div>
                                <input type="text" name="nama_belakang" autocomplete="off" required
                                    class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-orange-700 outline-none focus:border-indigo-500"
                                    placeholder="Nama Belakang">
                            </div>
                        </div>

                        <!-- email & username -->
                        <div class="w-full">
                            <label for="" class="text-xs font-semibold px-1">Email</label>
                            <div class="flex items-center">
                                <div
                                    class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                    <i class="fa-solid fa-envelope"></i>
                                </div>
                                <input type="email" name="email" autocomplete="off" required
                                    class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-orange-700 outline-none focus:border-indigo-500"
                                    placeholder="Email">
                            </div>
                        </div>
                        <div class="w-full">
                            <label for="" class="text-xs font-semibold px-1">Username</label>
                            <div class="flex items-center">
                                <div
                                    class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                    <i class="fa-solid fa-at"></i>
                                </div>
                                <input type="text" name="username" autocomplete="off" required
                                    class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-orange-700 outline-none focus:border-indigo-500"
                                    placeholder="Username">
                            </div>
                        </div>
                        <div class="w-full relative">
                            <label for="" class="text-xs font-semibold px-1">Password</label>
                            <div class="flex items-center">
                                <div
                                    class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                    <i class="fa-solid fa-lock"></i>
                                </div>
                                <input type="password" id="password" name="password" autocomplete="off" required
                                    class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-orange-700 outline-none focus:border-indigo-500"
                                    placeholder="Password">
                                <div class="absolute top-0 right-0 mt-2 mr-4 text-xs text-gray-600">
                                    <?php echo validation_errors(); ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5 justify-between mt-5">
                        <div class="w-full">
                            <div class="flex">
                                <div class="text-red-500">*</div>
                                <div class="text-sm font-medium text-white">
                                    Password harus memiliki 8 karakter
                                </div>
                            </div>
                        </div>
                        <div class="w-full">
                            <div class="flex items-center">
                                <input id="showpass" type="checkbox" value=""
                                    class="w-4 h-4 border border-orange-300 rounded bg-orange-50 focus:ring-3 focus:ring-blue-300"
                                    onchange="showPassword()">
                                <label for="showpass" class="ml-2 text-sm font-medium">Show Password</label>
                            </div>
                        </div>
                    </div>
                    <div class="flex -mx-3 mt-7">
                        <div class="w-full px-3 mb-8">
                            <button
                                class="block w-full max-w-xs mx-auto bg-orange-700 hover:bg-orange-900 focus:bg-orange-900 text-white rounded-lg px-3 py-3 font-semibold">Register</button>
                        </div>
                    </div>
                    <div class="text-sm font-medium text-white">
                        Sudah Memiliki Akun? <a href="<?= base_url('auth/index') ?>"
                            class="text-blue-700 hover:underline">Login Sekarang</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

<script>
function showPassword() {
    var x = document.getElementById("password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
</script>

<?php if ($this->session->flashdata('register_error')) { ?>
<script>
Swal.fire({
    title: 'Register Gagal',
    text: '<?php echo $this->session->flashdata('register_error'); ?>',
    icon: 'error',
    showConfirmButton: false,
    timer: 1500
});
</script>
<?php } ?>

<?php if ($this->session->flashdata('error')) { ?>
<script>
Swal.fire({
    title: 'Register Gagal',
    text: '<?php echo $this->session->flashdata('error'); ?>',
    icon: 'error',
    showConfirmButton: false,
    timer: 1500
});
</script>
<?php } ?>

</html>