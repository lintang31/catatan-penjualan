<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi App</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
</head>

<?php
$id_user = $_SESSION['id'];
$email = $_SESSION['email'];
$username = $_SESSION['username'];
$image = $_SESSION['image'];
?>

<body>

    <!-- Navbar -->
    <nav style="background-color: #ff8c00;"
        class="fixed top-0 z-50 w-full border-b border-gray-200 dark:border-gray-700">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start">
                    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar"
                        aria-controls="logo-sidebar" type="button"
                        class="inline-flex items-center p-2 text-sm text-black rounded-lg sm:hidden">
                        <i class="fa-solid fa-bars fa-xl" aria-hidden="true"></i>
                    </button>
                    <a class="flex ml-2 md:mr-24">
                        <span
                            class="self-center text-xl font-normal sm:text-2xl whitespace-nowrap dark:text-white">Pejualan
                            App</span>
                    </a>
                </div>
                <div class="flex items-center">
                    <div class="flex items-center ml-3">
                        <div>
                            <button type="button"
                                class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                                aria-expanded="false" data-dropdown-toggle="dropdown-user">
                                <span class="sr-only">Open user menu</span>
                                <img class="w-8 h-8 rounded-full" src="<?= base_url(
                                    'images/user/' . $image
                                ) ?>" alt="user photo"></button>
                        </div>
                        <div class="z-50 hidden my-4 text-base list-none bg-orange-50 divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
                            id="dropdown-user">
                            <div class="px-4 py-3" role="none">
                                <p class="text-sm text-gray-900 dark:text-white" role="none">
                                    <?= $username ?>
                                </p>
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                                    <?= $email ?>
                                </p>
                            </div>
                            <ul class="py-1" role="none">
                                <li>
                                    <a onclick="confirmLogout();"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                        role="menuitem">Log out</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <aside id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full border-r border-gray-200 sm:translate-x-0 dark:border-gray-200 bg-gray-200 dark:bg-gray-200"
        aria-label="Sidebar">
        <div class="h-full px-3 pb-4 overflow-y-auto border-r">
            <ul class="space-y-2 font-medium">
                <!-- Menu Dashboard -->
                <li>
                    <a href="<?php echo base_url('user'); ?>"
                        class="flex items-center p-2 text-orange-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <i
                            class="fas fa-tachometer-alt fa-fw fa-lg me-3 text-orange-400 group-hover:text-orange-900 dark:group-hover:text-white"></i>
                        <span class="ml-3">Dashboard</span>
                    </a>
                </li>
                <!-- Menu Manajemen Produk -->
                <li>
                    <a href="<?php echo base_url('user/manajemen_produk'); ?>"
                        class="flex items-center p-2 text-orange-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <i
                            class="fa-solid fa-cube fa-fw fa-lg me-3 text-orange-400 group-hover:text-orange-900 dark:group-hover:text-white"></i>
                        <span class="flex-1 ml-3 whitespace-nowrap">Manajemen Produk</span>
                    </a>
                </li>
                <!-- Menu History -->
                <li>
                    <a href="<?php echo base_url('user/history_jualan'); ?>"
                        class="flex items-center p-2 text-orange-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <i
                            class="fa-solid fa-clock-rotate-left fa-fw fa-lg me-3 text-orange-400 group-hover:text-orange-900 dark:group-hover:text-white"></i>
                        <span class="flex-1 ml-3 whitespace-nowrap">History</span>
                    </a>
                </li>
                <li>
                    <button type="button"
                        class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
                        aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                        <i
                            class="fa-solid fa-list fa-lg me-3 text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                        <span class="flex-1 ml-3 text-left whitespace-nowrap">Laporan Penjualan</span>
                        <i
                            class="fa-solid fa-chevron-down fa-lg me-3 text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                    </button>

                    <ul id="dropdown-example" class="hidden py-2 space-y-2">

                        <!-- Menu Harian -->
                        <li>
                            <a href="<?php echo base_url(
                                'user/laporan_harian'
                            ); ?>"
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                                <i
                                    class="fa-solid fa-calendar-day fa-lg me-3 text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                                <span class="flex-1 ml-3 whitespace-nowrap">Harian</span>
                            </a>
                        </li>

                        <!-- Menu Mingguan -->
                        <li>
                            <a href="<?php echo base_url(
                                'user/laporan_bulan'
                            ); ?>"
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                                <i
                                    class="fa-solid fa-calendar-week fa-lg me-3 text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                                <span class="flex-1 ml-3 whitespace-nowrap">Bulanan</span>
                            </a>
                        </li>

                        <!-- Menu Bulanan -->
                        <li>
                            <a href="<?php echo base_url(
                                'admin/laporan_tahunan'
                            ); ?>"
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                                <i
                                    class="fa-solid fa-calendar fa-lg me-3 text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                                <span class="flex-1 ml-3 whitespace-nowrap">Tahunan</span>
                            </a>
                        </li>
                        </a>
                    </ul>
                </li>
            </ul>
        </div>
    </aside>

    <div class="p-4 sm:ml-64">
    </div>

    <script>
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('33407527b00e1d0ff775', {
        cluster: 'ap1'
    });

    var channel = pusher.subscribe('ExcAbsensiVersi1');
    channel.bind('my-event', function(data) {
        alert(JSON.stringify(data.message));
    });
    </script>

    <script>
    function confirmLogout() {
        Swal.fire({
            title: 'Yakin ingin logout?',
            text: "Anda akan keluar dari akun Anda.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Logout',
            cancelButtonText: 'Tidak'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?php echo base_url('auth/logout'); ?>";
            }
        });
    }
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>

</body>

</html>