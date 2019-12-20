<?php

$hostname = "localhost";
$uasername= "root";
$password = "";
$db       = "db_pwd";

$connect = mysqli_connect($hostname, $uasername, $password, $db);

if (!$connect) {
    die(" database error : ".mysqli_connect_error());
}

?>