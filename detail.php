<?php 
require 'database.php';

$title = "Details";
$id = $_GET['id'];
$file = 'mahasiswa.json';
$mahasiswa = file_get_contents($file);
$datajson = json_decode($mahasiswa, true);

?>
<?php require 'v_header.php'; ?>

<div class="container p-3">
    <div class="row mt-3 justify-content-md-center">
        <div class="col-md-4">

        <div class="card bg-light border-success mb-3" style="max-width: 19rem;">
            <div class="card-header"> <b> Members Detail </b></div>
            <div class="card-body"> 
                <?php 
                foreach ($datajson as $data){
                if ($data['id'] === $id) { ?>
                <h4 class="card-title"> ID-<?= $data['id']; ?></h4>
                <p class="card-text"><?= $data['name']; ?></p>
                <p class="card-text"><?= $data['email']; ?> </p>
                <a href="dashboard.php" class="btn btn-primary float-right">Kembali</a>
                <?php }} ?>
            </div>
        </div>
    </div>
</div>

<?php require 'v_footer.php'; ?>