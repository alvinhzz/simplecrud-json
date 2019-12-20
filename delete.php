<?php

// File json yang akan dibaca
$file = "mahasiswa.json";

// Mendapatkan file json
$mahasiswa = file_get_contents($file);

// Mendecode anggota.json
$datajson = json_decode($mahasiswa, true);

$id = $_GET['id'];

// Membaca data array menggunakan foreach
foreach ($datajson as $key => $d) {
    // Hapus data kedua
    if ($d['id'] === $id) {
        // Menghapus data array sesuai dengan index
        // Menggantinya dengan elemen baru
        array_splice($datajson, $key, 1);
    }
}

// Mengencode data menjadi json
$deletejson = json_encode($datajson, JSON_PRETTY_PRINT);

// Menyimpan data ke dalam anggota.json
$prosesdeletejson = file_put_contents($file, $deletejson);

if ($prosesdeletejson) {
    header("location:dashboard.php");
}

?>