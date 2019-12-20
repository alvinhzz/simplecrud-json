<?php
$title = "Insert Data";
$file = "mahasiswa.json";

if (isset($_POST['tambahData'])) {

$mahasiswa = file_get_contents($file);
$datajson = json_decode($mahasiswa, true);

    $datajson[] = array(
        "id" => $_POST['id'],
        "name" => $_POST['nama'],
        "email" => $_POST['email']
    );

$tambahjson = json_encode($datajson, JSON_PRETTY_PRINT);
$prosestambahjson = file_put_contents($file, $tambahjson);

    if ($prosestambahjson) {
        header('Location: dashboard.php?status=sukses');
    }else{
        header('Location: dashboard.php?status=gagal');
    }
}
?>