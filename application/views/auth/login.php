<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.4.2/zxcvbn.js"></script>
</head>

<body class="bg-gray-900 text-white">
    <div class="min-w-screen min-h-screen flex items-center justify-center px-5 py-5">
        <div class="bg-gray-800 text-gray-500 rounded-3xl shadow-xl w-full overflow-hidden max-w-md">
            <!-- Login form -->
            <div class="w-full py-10 px-5">
                <div class="text-center mb-5">
                    <h1 class="font-bold text-3xl">Login</h1>
                </div>
                <form class="mt-7" action="<?php echo base_url('auth/aksi_login'); ?>" method="post">
                    <div class="mb-5">
                        <label for="" class="text-xs font-semibold">Email</label>
                        <div class="flex items-center">
                            <div
                                class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <input type="email" name="email" autocomplete="off" required
                                class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-700 outline-none focus:border-indigo-500"
                                placeholder="Email">
                        </div>
                    </div>
                    <div class="mb-5">
                        <label for="" class="text-xs font-semibold">Password</label>
                        <div class="flex items-center">
                            <div
                                class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center">
                                <i class="fa-solid fa-lock"></i>
                            </div>
                            <input type="password" id="password" name="password" autocomplete="off" required
                                class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-700 outline-none focus:border-indigo-500"
                                placeholder="Password">
                        </div>
                    </div>
                    <div class="flex justify-between mt-3">
                        <div class="flex items-center">
                            <input id="showpass" type="checkbox" value=""
                                class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300"
                                onchange="showPassword()">
                            <label for="showpass" class="ml-2 text-sm font-medium">Show Password</label>
                        </div>
                        <div class="text-sm font-medium"><a href="" class="text-blue-500 hover:underline">Jangan Lupa
                                Makan</a></div>
                    </div>
                    <div class="flex mt-4">
                        <button
                            class="w-full bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg px-3 py-3 font-semibold">Login</button>
                    </div>
                    <div class="text-sm font-medium mt-5">
                        Tidak Memiliki Akun? <a href="<?= base_url('auth/register') ?>"
                            class="text-blue-500 hover:underline">Registrasi Sekarang</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

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

<?php if ($this->session->flashdata('register_success')) { ?>
<script>
Swal.fire({
    title: 'Registrasi Berhasil',
    text: '<?php echo $this->session->flashdata('register_success'); ?>',
    icon: 'success',
    showConfirmButton: false,
    timer: 1500
});
</script>
<?php } ?>

<?php if ($this->session->flashdata('login_error')) { ?>
<script>
Swal.fire({
    title: 'Login Error',
    text: '<?php echo $this->session->flashdata('login_error'); ?>',
    icon: 'error',
    showConfirmButton: false,
    timer: 1500
});
</script>
<?php } ?>

</html>