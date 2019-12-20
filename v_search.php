<?php require 'database.php'; ?>
<?php require 'v_header.php'; ?>

    <div class="container p-3">
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <a class="btn btn-success" href="v_insert.php"><i class='fas fa-plus' style='font-size:12px'></i>&nbsp;Tambah Data</a>
                </div>
                <div class="col-4">
                    <form class="form-inline my-2 my-lg-0" action="v_search.php" method="GET">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>
        <?php 
            if(isset($_GET['cari'])){
                $cari = $_GET['cari'];
                echo "<b>Hasil pencarian : ".$cari."</b>";
            }
        ?>
        <div class="container p-3">
        <table class="table table-striped table-sm">
            <thead class="thead-dark">
                <tr>
                <th scope="col">Numbers</th>
                <th scope="col">Members Name</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if(isset($_GET['cari'])){
                    $cari = $_GET['cari'];
                    $query = mysqli_query($connect, "SELECT * FROM mahasiswa where nama like '%".$cari."%' and nim like '%".$cari."%' and jkel like '%".$cari."%' and alamat like '%".$cari."%' and tgllhr like '%".$cari."%'");				
                }else{
                    $query = mysqli_query($connect, "SELECT * FROM mahasiswa");		
                }
                $nomor = 1;
                while ($data = mysqli_fetch_array($query)) {
                ?>
                <tr>
                <td><?= $nomor++ ?></td>
                <td><?= $data['member_name'] ?></td>
                <td>
                    <div class="row">
                        <div class="mr-2">
                            <a class="badge badge-success float-right" href="detail.php?id=<?= $data['member_id'] ?>">Detail</a>
                        </div>
                        <div>
                            <a class="badge badge-warning float-right" href="v_edit.php?id=<?= $data['member_id']; ?>">Edit</a>
                        </div>
                        <div class="ml-2">
                            <a class="badge badge-danger float-right" href="delete.php?id=<?= $data['member_id'] ?>">Delete</a>
                        </div>
                    </div>
                </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        </div>
    </div>
<?php require 'v_footer.php'; ?>