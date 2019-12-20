<head>
  <title>Halaman Login</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/all.css">\
  <?php 
  session_start();
  if (isset($_SESSION['status'])) {
    if($_SESSION['status']=="login"){
      header("location:dashboard.php?status=akses-dilarang");
    }
  }
	?>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h1 class="card-title text-center font-weight-bold">LOGIN</h1>
            <?php 
              if(isset($_GET['status'])){
                if($_GET['status'] == "gagal"){ ?>
                  <div class="alert alert-danger" role="alert">
                    Login Gagal username dan password salah!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                  </div>
            <?php }else if($_GET['status'] == "logout"){ ?>
                  <div class="alert alert-success" role="alert">
                    Anda telah berhasil logout
                  </div>
            <?php }else if($_GET['status'] == "belum_login"){ ?>
                  <div class="alert alert-warning" role="alert">
                    Anda harus login untuk mengakses halaman admin
                  </div>
            <?php } } else if(isset($_GET['captcha'])){?>
                  <?php if ($_GET['captcha'] == "gagal") {?>
                    <div class="alert alert-warning" role="alert">
                      Periksa kode captcha
                    </div>
                  <?php } }?>
              <hr class="my-3">
            <form class="form-signin" action="login.php" method="POST">
              <div class="form-label-group">
                <input type="email" id="inputEmail" name="inputEmail"class="form-control" placeholder="Email address" required autofocus>
                <label for="inputEmail">Email address</label>
              </div>

              <div class="form-label-group">
                <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required>
                <label for="inputPassword">Password</label>
              </div>

              <div class="row">
                <div class="col col-3 pl-4 pt-2">
                  <div class="form-label-group">
                    <img src="captcha.php">
                  </div>
                </div>
                <div class="col col-9">
                  <div class="form-label-group">
                    <input class="form-control" name="captcha_code" id="captcha_code" placeholder="Enter Captcha" type="text">
                    <label for="captcha_code">Enter Captcha</label>
                  </div>
                </div>
              </div>

              <hr class="my-3">
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="submit">Masuk</button>
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="assets/js/jquery.min.js"></script>
</body>