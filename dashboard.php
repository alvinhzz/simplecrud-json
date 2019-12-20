<?php require 'tampil.php'; ?>
<?php require 'v_header.php'; ?>

    <div class="container p-3">
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <a class="btn btn-success" href="v_insert.php"><i class='fas fa-plus' style='font-size:12px'></i>&nbsp;Tambah Data</a>
                    <a class="btn btn-danger" href="mahasiswa.json">JSON DATA</a>
                </div>
                <div class="col-4">
                    <form class="form-inline my-2 my-lg-0" action="v_search.php" method="GET">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>

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
          
                $file = 'mahasiswa.json';

                $mahasiswa = file_get_contents($file);

                $datajson = json_decode($mahasiswa, true);

                $no = 1;

                foreach ($datajson as $data) {
                    echo "<tbody>
                    <tr class='active'>";
                    echo "<td>".$no."</td>";
                    echo "<td>".$data['name']."</td>";
                    $no = $no+1;
            ?>
                <td>
                   <div class="row">
                        <div class="mr-2">
                            <a class="badge badge-success float-right" href="detail.php?id=<?= $data['id'] ?>">Detail</a>
                        </div>
                        <div>
                            <a class="badge badge-warning float-right" href="v_edit.php?id=<?= $data['id']; ?>">Edit</a>
                        </div>
                        <div class="ml-2">
                            <a class="badge badge-danger float-right" href="delete.php?id=<?= $data['id'] ?>">Delete</a>
                        </div>
                    </div>
                </td>
            <?php }?>
                <tr>
                    <td colspan="3">
                        <a class="btn btn-secondary btn-sm" href="cetak.php">Cetak</a>
                    </td>
                </tr>
            </tbody>
        </table>
        </div>
    </div>
<?php require 'v_footer.php'; ?>