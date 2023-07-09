<?php
// Koneksi ke database
$konek = mysqli_connect("localhost", "wms", "allahuakbar456", "wms");

// Mengambil data rata-rata bulanan
$query = "SELECT MONTH(waktu) AS bulan, AVG(curah_hujan) AS rata_curah_hujan FROM tabel_sensor GROUP BY MONTH(waktu) ORDER BY MONTH(waktu)";
$result = mysqli_query($konek, $query);

// Menginisialisasi array untuk data grafik
$bulan = array();
$rata_curah_hujan = array();

while ($row = mysqli_fetch_assoc($result)) {
    $namaBulan = date("F", mktime(0, 0, 0, $row['bulan'], 1));
    $bulan[] = $namaBulan;
    $rata_curah_hujan[] = $row['rata_curah_hujan'];
}
?>

<div clas="judul" style="border: 2px solid black; background-color: #0077be;">
    <h4 style="color: #ffffff;">Curah Hujan Bulanan (mm)</h4>
</div>
<div class="panel" style="border: 2px solid black;">
    <div class="panel-body">
        <!-- paper -->
        <canvas id="grafik_summary_curah_hujan" style="width: 100%; height: 28rem; margin-bottom: 3rem;"></canvas>
        <script>
        var ctx = document.getElementById('grafik_summary_curah_hujan').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($bulan); ?>,
                datasets: [{
                    label: 'Curah Hujan',
                    data: <?php echo json_encode($rata_curah_hujan); ?>,
                    backgroundColor: 'rgba(139, 69, 19, 1)',
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
