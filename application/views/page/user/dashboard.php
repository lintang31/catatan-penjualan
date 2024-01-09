<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi App</title>
    <link rel="icon" href="<?php echo base_url(
        './src/assets/image/absensi.png'
    ); ?>" type="image/gif">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.0/chart.min.js"
        integrity="sha512-7U4rRB8aGAHGVad3u2jiC7GA5/1YhQcQjxKeaVms/bT66i3LVBMRcBI9KwABNWnxOSwulkuSXxZLGuyfvo7V1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
</head>

<body>
    <?php $this->load->view('component/sidebar_user'); ?>
    <div class="p-2 sm:ml-64">
        <!-- Card Selamat Datang -->
        <div class="mt-10 w-full">
            <div
                class="p-4 text-center bg-gray-400 border border-gray-200 rounded-lg shadow sm:p-8 dark:bg-gray-800 dark:border-gray-700">
                <?php
             // Set the default timezone to UTC
                date_default_timezone_set('UTC');
                $currentDateTime = new DateTime();
            // Set the timezone to Asia/Jakarta
               $currentDateTime->setTimezone(new DateTimeZone('Asia/Jakarta'));
               $date = $currentDateTime->format('l, d F Y');
               $timeWIB = $currentDateTime->format('H:i');
               ?>

                <h2 class="text-2xl font-semibold mb-4">Selamat Datang
                    <span><?php echo $this->session->userdata('username'); ?></span>
                </h2>
                <p class="text-gray-600">Selamat datang di aplikasi Penjualan,
            </div>
        </div>
    </div>

    <script>
    const ctx = document.getElementById('myChart');

    function updateChart() {
        $.ajax({
            url: '<?= base_url('admin/get_realtime_absensi') ?>',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                const labels = data.map(item => moment(item.tanggal_absen).format('DD MMM'));
                const values = data.map(item => item.absensi_count);

                myChart.data.labels = labels;
                myChart.data.datasets[0].data = values;
                myChart.update();
            },
            error: function(error) {
                console.error('Error fetching realtime absensi data:', error);
            }
        });
    }

    // Set interval untuk memperbarui grafik setiap beberapa detik
    setInterval(updateChart, 1000); // Ganti sesuai dengan kebutuhan

    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [],
            datasets: [{
                label: 'Absensi',
                data: [],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    max: 30
                }
            }
        }
    });
    </script>
</body>

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

</html>