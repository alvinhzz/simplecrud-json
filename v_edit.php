<?php
require 'edit.php';
$id    = $_GET['id'];
$file = 'mahasiswa.json';
$mahasiswa = file_get_contents($file);

$datajson = json_decode($mahasiswa, true);
require 'v_header.php';
?>

<div class="container p-3">
<div class="row mt-3 justify-content-md-center">
    <div class="col-md-6">
        <div class="card">  
            <div class="card-header">
                Edit Data Mahasiswa
            </div>
                <?php foreach($datajson as $data){ 
                    if ($data['id'] === $id) {
                    ?>
                <form action="edit.php" method="post" class="p-3" onsubmit="return validasi(this)" id="form" name="form">
                    <div class="form-group">
                        <label for="id">ID Member (Auto Increment)</label>
                        <input type="text" class="form-control" id="id" name="id" readonly value="<?= $data['id'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $data['name'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="<?= $data['email'] ?>">
                    </div>
                    <div class="mr-3">
                    <button type="submit" name="editData" class="btn btn-primary float-right">Update Data</button>
                    </div>
                    <div class="ml-3">
                    <a class="btn btn-danger float-left" href="dashboard.php">Kembali</a>
                    </div>
                </form>
                <?php } } ?>           
            </div>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
    function validasi(form) {
        if (nama.value == "") {
            alert('Nama harus di isi');
            nama.focus();
            return false;
        }
        if (email.value == "") {
            alert('Email harus di isi');
            email.focus();
            return false;
        }
        pola_nama=/^[A-Za-z. ]+$/;
        if (!nama.value.match(pola_nama)) {
            alert('Nama tidak valid');
            nama.focus();
            return false;
        }
        pola_email=/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        if (!email.value.match(pola_email)) {
            alert('Email tidak valid');
            email.focus();
            return false;
        }
        return true;
    }

<?php require 'v_footer.php'; ?>