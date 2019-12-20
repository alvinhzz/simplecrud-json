<?php

session_start();

require "database.php";

if (isset($_POST['submit'])) {
    if ($_POST['captcha_code'] == $_SESSION['captcha_code']) {
        $username = $_POST['inputEmail'];
        $password = $_POST['inputPassword'];
        
        $query = mysqli_query($connect, "SELECT * FROM admin WHERE email='$username' and password='$password'");
        
        $data = mysqli_num_rows($query);
        
        if ($data > 0) {
            $_SESSION['username'] = $username;
            $_SESSION['status'] = "login";
            header("Location: dashboard.php");
        }else{
            header("Location: index.php?status=gagal");
        }
    }else{
        header("Location: index.php?captcha=gagal");
    }
}

?>