<?php
$id = $_GET['id'];
$title = "Update Data";

$file = "mahasiswa.json";

$mahasiswa = file_get_contents($file);

$datajson = json_decode($mahasiswa, true);

if (isset($_POST['editData'])) {
    
    foreach ($datajson as $data) {
    
    if ($data['id'] === $id) {
        $data['name'] = $_POST['nama'];
        $data['email'] = $_POST['email'];
    }
}
    $jsonfile = json_encode($datajson, JSON_PRETTY_PRINT);
    $prosesupdate = file_put_contents($file, $jsonfile);

    if ($prosesupdate) {
        header('Location: dashboard.php?status=sukses-update');
    }else{
        header('Location: dashboard.php?status=gagal');
    }
}
?>