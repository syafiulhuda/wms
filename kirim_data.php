<?php
// konek database
$konek = mysqli_connect("localhost", "wms", "allahuakbar456", "wms");

$suhu = $_POST['suhu'];
$kelembapan = $_POST['kelembapan'];
$curah_hujan = $_POST['curah_hujan'];
$kecepatan_angin = $_POST['kecepatan_angin'];


mysqli_query($konek, "ALTER TABLE tabel_sensor AUTO_INCREMENT=1");
$save = mysqli_query($konek, "INSERT INTO tabel_sensor(suhu, kelembapan, curah_hujan, kecepatan_angin) VALUES('$suhu', '$kelembapan', '$curah_hujan', '$kecepatan_angin')") or die(mysqli_error($konek));

if ($save) {
    echo "Completed to save";
} else {
    echo "Failed to save";
}
?>
