<?php
require 'database.php';
$title = "Dashboard";
$query = mysqli_query($connect, "SELECT * FROM members");

?>