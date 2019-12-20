<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <?php 
	session_start();
	if($_SESSION['status']!="login"){
		header("location:index.php?status=belum_login");
	}
	?>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
    <a class="navbar-brand" href="dashboard.php">Simple CRUD</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link" href="dashboard.php">Members<span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="v_about.php">About</a>
        </div>
    </div>
    <div class="nav justify-content-end pt-3 pr-2">
        <p class="btn btn-warning" href="logout.php"><?php echo $_SESSION['username']; ?></p>
    </div>
    <div class="nav justify-content-end">
        <a class="btn btn-danger" href="logout.php">Logout</a>
    </div>
    </div>
</nav>