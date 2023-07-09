<?php
// Koneksi ke database
$konek = mysqli_connect("localhost", "wms", "allahuakbar456", "wms");

// Mengambil data rata-rata bulanan
$query = "SELECT DATE(waktu) AS tanggal, AVG(curah_hujan) AS rata_curah_hujan FROM tabel_sensor GROUP BY DATE(waktu) ORDER BY DATE(waktu) DESC LIMIT 10";
$result = mysqli_query($konek, $query);

$hari = array();
$rata_curah_hujan = array();

while ($row = mysqli_fetch_assoc($result)) {
    $tanggal = date("l", strtotime($row['tanggal']));
    $hari[] = $tanggal;
    $rata_curah_hujan[] = $row['rata_curah_hujan'];
}
?>

<div clas="judul" style="border: 2px solid black; background-color: #0077be;">
    <h4 style="color: #ffffff;">Curah Hujan (mm)</h4>
</div>
<div class="panel" style="border: 2px solid black;">
    <div class="panel-body">
        <!-- paper -->
        <canvas id="myChart_3" style="width: 100%; height: 28rem; margin-bottom: 3rem;"></canvas>
        <script>
        var ctx = document.getElementById('myChart_3').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($hari); ?>,
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
