<?php
session_start();
require'functions.php';
if(isset($_POST["login"])) {

	$username = $_POST["username"];
	$password = $_POST["password"];


	$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
  setcookie('login', $_POST["username"] );

	//cek username
	if (mysqli_num_rows($result)=== 1) {
		
		//cek passwordnya
		$row = mysqli_fetch_assoc($result);
		if (password_verify($password, $row["password"])) {


      // cek session
      $_SESSION[login]= true;
      header("location: index.php");
			exit;
		}

	}
$error = true;
}


// registrasi
IF ( isset($_POST["register"]) ) {
  if(registrasi($_POST)>0){
    echo 
    "<script>
      alert('Anda Berhasi Registrasi, Silahkan Klik OK');
      document.location.href = 'login.php';
    </script>"; 
  } else {
    echo mysqli_error($conn);
  }
  }


?>
<!DOCTYPE html>
<html lang="en" id="home">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>LOGIN</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>

<br>



<!-- LOGIN <-->
<div class="container">
	<h1 class="text-center" style="font-size: 40px; margin-top:  ">LOGIN</h1><br><center>
	<img src="img/minion11.png" style="width: 300px; height: 300px;"></center><br>
  <?php if(isset($error)) :  ?>
  <p style="color: red; font-style: italic;  font-size: 30px;" class="text-center">Username / Password Salah</p>

<?php endif; ?>


      <form action="" method="post" class="form-horizontal">
  <div class="form-group">
    <label for="username" class="col-sm-2  col-sm-offset-2 control-label" style="font-size: 15px;">Username :</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="username" placeholder="Masukan Username" name="username" autocomplete="off" autofocus="">
    </div>
  </div>
  <div class="form-group">
    <label for="password" class="col-sm-2 col-sm-offset-2 control-label" style="font-size: 15px;">Password :</label>
    <div class="col-sm-4">
      <input type="password" class="form-control" id="password" placeholder="Masukan Password" name="password">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-8 col-sm-offset-4 ">
      <button type="submit" class="btn btn-primary btn-lg" name="login"> Login </button>
    </div>
  </div>
</form>
</div>



<!-- Registrasi -->
<!-- Large modal -->
<p class="text-center" style="font-size: 13px;">Belum punya akun?? Silahkan daftar<br>  di bawah ini</p>
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target=".bs-example-modal-lg" style="margin-left: 500px; width: 365px; ">Registrasi</button>

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
       <h1 class="text-center" style="font-size: 40px;">REGISTRASI</h1><br><br>


      <form action="" method="post" class="form-horizontal">
  
  <div class="form-group">
    <label for="username" class="col-sm-2  col-sm-offset-2 control-label">Username :</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="username" placeholder="Masukan Username" name="username" autocomplete="off">
    </div>
  </div>
  <div class="form-group">
    <label for="namalengkap" class="col-sm-2  col-sm-offset-2 control-label">Nama Lengkap :</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="namalengkap" placeholder="Masukan Nama Lengkap" name="namalengkap" autocomplete="off">
    </div>
  </div>
  <div class="form-group">
    <label for="email" class="col-sm-2 col-sm-offset-2 control-label">Email :</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="email" placeholder="Masukan Email" name="email" autocomplete="off">
    </div>
  </div>
  <div class="form-group">
    <label for="password" class="col-sm-2 col-sm-offset-2 control-label">Password :</label>
    <div class="col-sm-4">
      <input type="password" class="form-control" id="password" placeholder="Masukan Password" name="password">
    </div>
  </div>
  <div class="form-group">
    <label for="password2" class="col-sm-2 col-sm-offset-2 control-label">Konfirmasi Password :</label>
    <div class="col-sm-4">
      <input type="password" class="form-control" id="password2" placeholder="Masukan Konfirmasi Password" name="password2">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-8 col-sm-offset-4 ">
      <button type="submit" class="btn btn-primary btn-lg" name="register"> Registrasi</button>
    </div>
  </div>
    </div>
  </div>
</div>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

    <script src="js/script.js"></script>

    
  </body>
</html> 

