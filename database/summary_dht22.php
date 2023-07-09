<?php
// Koneksi ke database
$konek = mysqli_connect("localhost", "wms", "allahuakbar456", "wms");

// Mengambil data rata-rata bulanan
$query = "SELECT MONTH(waktu) AS bulan, AVG(suhu) AS rata_suhu, AVG(kelembapan) AS rata_kelembapan FROM tabel_sensor GROUP BY MONTH(waktu) ORDER BY MONTH(waktu)";
$result = mysqli_query($konek, $query);

// Menginisialisasi array untuk data grafik
$bulan = array();
$rata_suhu = array();
$rata_kelembapan = array();

while ($row = mysqli_fetch_assoc($result)) {
    $namaBulan = date("F", mktime(0, 0, 0, $row['bulan'], 1));
    $bulan[] = $namaBulan;
    $rata_suhu[] = $row['rata_suhu'];
    $rata_kelembapan[] = $row['rata_kelembapan'];
}
?>

<div clas="judul" style="border: 2px solid black; background-color: #0077be;">
    <h4 style="color: #ffffff;">Suhu (&deg;C) & Kelembapan (%) Bulanan</h4>
</div>
<div class="panel" style="border: 2px solid black;">
    <div class="panel-body">
        <!-- paper -->
        <canvas id="grafik_summary_dht22" style="width: 100%; height: 28rem; margin-bottom: 3rem;"></canvas>
        <script>
             var ctx = document.getElementById('grafik_summary_dht22').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($bulan); ?>,
                datasets: [{
                        label: 'Suhu',
                        data: <?php echo json_encode($rata_suhu); ?>,
                        backgroundColor: 'rgba(255, 0, 0, 0.5)',
                        borderWidth: 1
                    },
                    {
                        label: 'Kelembapan',
                        data: <?php echo json_encode($rata_kelembapan); ?>,
                        backgroundColor: 'rgba(0, 255, 0, 0.5)',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        </script>
        <!--  -->
    </div>
</div>