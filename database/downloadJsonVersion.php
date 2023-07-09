<?php
$file_name = "../dataJSON.json";

// Memeriksa apakah file ada
if (file_exists($file_name)) {
    // Mendapatkan data JSON dari file
    $json_data = file_get_contents($file_name);

    // Mengubah data JSON menjadi array
    $data = json_decode($json_data, true);

    // Memeriksa apakah ada data yang diambil
    if (!empty($data)) {
        // Mendapatkan kolom pertama sebagai header CSV
        $header = array_keys($data[0]);

        // Membuka file temporary untuk menulis data CSV
        $temp_file = fopen('php://temp', 'w');

        // Menulis header ke file CSV
        fputcsv($temp_file, $header);

        // Menulis data ke file CSV
        foreach ($data as $row) {
            fputcsv($temp_file, $row);
        }

        // Memindahkan pointer file ke awal
        rewind($temp_file);

        // Membaca isi file temporary sebagai string
        $csv_data = stream_get_contents($temp_file);

        // Menutup file temporary
        fclose($temp_file);

        // Menentukan tipe konten sebagai file CSV
        header('Content-Type: text/csv');

        // Menentukan ukuran file
        header('Content-Length: ' . strlen($csv_data));

        // Menentukan header untuk mendownload file dengan nama yang diinginkan
        header('Content-Disposition: attachment; filename="' . basename($file_name, '.json') . '.csv"');

        // Mengirimkan data CSV sebagai respons
        echo $csv_data;

        // Menghapus isi file
        file_put_contents($file_name, '');


        exit;
    } else {
        echo "Data kosong. Tidak ada yang dapat dikonversi.";
    }
} else {
    echo "File tidak ditemukan.";
}
?>
