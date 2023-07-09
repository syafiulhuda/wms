<?php
// konek database
$konek = mysqli_connect("localhost", "wms", "allahuakbar456", "wms");

// baca data (rules: 5 data terakhir)
$sql_ID = mysqli_query($konek, "SELECT MAX(ID) FROM tabel_sensor");
$data_ID = mysqli_fetch_array($sql_ID);
$ID_akhir = $data_ID['MAX(ID)'];
$ID_awal = $ID_akhir - 9;

// waktu = sumbu x
$waktu = mysqli_query($konek, "SELECT waktu FROM tabel_sensor WHERE ID>= '$ID_awal' AND ID<='$ID_akhir' ORDER BY ID ASC");

// X kecepatan angin
$kecepatanAngin = mysqli_query($konek, "SELECT kecepatan_angin FROM tabel_sensor WHERE ID>= '$ID_awal' AND ID<='$ID_akhir' ORDER BY ID ASC");


?>

<div class="judul" style="border: 2px solid black; background-color: #0077be;">
    <h4 style="color: #ffffff;">Kecepatan Angin (Km/Jam)</h4>
</div>
<div class="panel" style="border: 2px solid black;">
    <div class="panel-body">
        <!-- paper -->
        <canvas id="myChart_2" style="width: 100%; height: 28rem; margin-bottom: 3rem;"></canvas>
        <script>
            const data = {
                labels: [
                    <?php
                    while ($timeStamp = mysqli_fetch_array($waktu)) {
                        $time = strtotime($timeStamp['waktu']);
                        $formattedTime = date('H:i', $time);
                        echo '"' . $formattedTime . '",';
                    }
                    ?>
                ],
                datasets: [{
                    label: 'Kecepatan Angin',
                    data: [<?php
                            while ($data_kecepatanAngin = mysqli_fetch_array($kecepatanAngin)) {
                                echo $data_kecepatanAngin['kecepatan_angin'] . ',';
                            }
                            ?>],
                    borderColor: 'purple',
                    fill: false
                }]
            };

            const config = {
                type: 'line',
                data: data,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'bottom'
                        }
                    },
                    scales: {
                        x: {
                            display: true,
                            title: {
                                display: true,
                                text: 'Waktu'
                            }
                        },
                        y: {
                            display: true,
                            title: {
                                display: true,
                                text: 'Data'
                            }
                        }
                    }
                }
            };

            const ctx = document.getElementById('myChart_2').getContext('2d');
            const myChart = new Chart(ctx, config);
        </script>





        <!--  -->
    </div>
</div>