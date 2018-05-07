<?php
require 'functions.php';

$id = $_GET["id"];
$art = query("SELECT * FROM artikel WHERE id = $id")[0];

// ubah data
if(isset($_POST["submit"])) {
  if(ubah($_POST) > 0) {
    echo "<script>
            
          alert('Artikel berhasil diubah');
          document.location.href='index.php';
          
           </script>";
  } else {
    echo "<script>
            
          alert('Artikel gagal diubah');
          document.location.href='index.php';
          

          </script>";
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
    <title></title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>

<form action="" method="post" class="form-horizontal"><center>

  <div class="form-group" style="margin-top: 20px;">
  <input type="hidden" name="id" value="<?= $art["id"]; ?>">
    <label for="judul"  class="col-sm-2  col-sm-offset-2 control-label" style="font-size: 15px;">Judul :</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="judul" placeholder="Masukan Judul" name="judul" autocomplete="off" autofocus="" value="<?= $art["judul"]; ?>">
    </div>
  </div>
  <div class="form-group">
    <textarea name="artikel" id="artikel" placeholder="Tulis disini....." cols="116" rows="200"    style="margin-top: 20px; height: 400px;opacity: .8;"><?= $art["artikel"]; ?></textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-8 col-sm-offset-4 ">
      <button type="submit" class="btn btn-primary btn-lg" name="submit"> Ubah </button>
    </div>
  </div>
</form>
</center>





    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

    <script src="js/script.js"></script>

    
  </body>
</html> 

