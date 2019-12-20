<?php

require "database.php";

$query = mysqli_query($connect, "SELECT * FROM members ORDER BY member_id DESC");

if (mysqli_num_rows($query)==0) {
    echo "<tbody>
    <tr class='active'>
    <td colspan='5'>Tdak ada data yang dientrikan</td>
    </tr>
    </tbody>";
}else {
    while ($data = mysqli_fetch_array($query)) {
        $datajson[] = array(
            "id" => $data['member_id'],
            "name" => $data['member_name'],
            "email" => $data['member_email']
        );
    }

    $jsonfile = json_encode($datajson, JSON_PRETTY_PRINT);
    echo $jsonfile;
    $simpan = file_put_contents('mahasiswa.json', $jsonfile);
}

?>