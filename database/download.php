<?php
// Koneksi ke database
$konek = mysqli_connect("localhost", "wms", "allahuakbar456", "wms");

// Query untuk mengambil data dari tabel_sensor
$query = "SELECT * FROM tabel_sensor";
$result = mysqli_query($konek, $query);

// Membuat file CSV
$filename = "data_sensor.csv";
$file = fopen($filename, "w");

// Menulis header kolom
$header = array("ID", "Suhu", "Kelembapan", "Curah Hujan", "Kecepatan Angin", "Waktu");
fputcsv($file, $header);

// Menulis data ke file
while ($row = mysqli_fetch_assoc($result)) {
    fputcsv($file, $row);
}

fclose($file);

// Set header untuk tindakan download
header("Content-Type: application/csv");
header("Content-Disposition: attachment; filename=$filename");

// Mengirim file ke pengguna
readfile($filename);

// Menghapus file setelah dikirim
unlink($filename);
?>
