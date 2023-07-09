<?php
// Koneksi ke database
$konek = mysqli_connect("localhost", "wms", "allahuakbar456", "wms");

// Mengambil data rata-rata bulanan
$query = "SELECT MONTH(waktu) AS bulan, AVG(kecepatan_angin) AS rata_kecepatan_angin FROM tabel_sensor GROUP BY MONTH(waktu) ORDER BY MONTH(waktu)";
$result = mysqli_query($konek, $query);

// Menginisialisasi array untuk data grafik
$bulan = array();
$rata_kecepatan_angin = array();

while ($row = mysqli_fetch_assoc($result)) {
    $namaBulan = date("F", mktime(0, 0, 0, $row['bulan'], 1));
    $bulan[] = $namaBulan;
    $rata_kecepatan_angin[] = $row['rata_kecepatan_angin'];
}
?>

<div clas="judul" style="border: 2px solid black; background-color: #0077be;">
    <h4 style="color: #ffffff;">Kecepatan Angin Bulanan (Km/Jam)</h4>
</div>
<div class="panel" style="border: 2px solid black;">
    <div class="panel-body">
        <!-- paper -->
        <canvas id="grafik_summary_kecepatan_angin" style="width: 100%; height: 28rem; margin-bottom: 3rem;"></canvas>
        <script>
        var ctx = document.getElementById('grafik_summary_kecepatan_angin').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($bulan); ?>,
                datasets: [{
                    label: 'Kecepatan Angin',
                    data: <?php echo json_encode($rata_kecepatan_angin); ?>,
                    backgroundColor: 'rgba(255, 140, 0, 0.8)',
                    borderWidth: 1
                }]
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
