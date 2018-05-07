<?php
session_start();
require'functions.php';

$iniartikel = query("SELECT * FROM artikel");

if (!isset($_SESSION['login'])) {
  header("location: login.php");
  exit;
}


// insert data
if(isset($_POST["tambah"]) ) {
  
  if(tambah($_POST) > 0) {
    echo "<script>
            
          alert('Artikel berhasil ditambahkan');
          document.location.href='index.php';
          
           </script>";
  } else {
    echo "<script>
            
          alert('Artikel gagal ditambahkan');
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
    <title>Selamat Datang</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <div class="jumbotron text-center" style="opacity: .4;">
        <p style="font-size: 38px; height: 70px; line-height: 60px; "><b>Hallo Selamat Datang <br>  <?php echo $_COOKIE['login']; ?></b></p>

        
    </div>   



       <!-- Navbar -->
       <section class="navbar">

        <nav class="navbar navbar-inverse navbar-fixed-top">
          <div class="container-fluid">
            <div class="navbar-header"> 

        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

              <a href="#home" class="navbar-brand" class="page-scroll">  <?php echo $_COOKIE['login']; ?></a>
                    <a href="logout.php"><button class="btn-danger btn-sm" style="margin-top: 10px;">Logout</button></a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right">
                <li><a href="#" class="page-scroll">Artikel</a></li>
              </ul> 
              </div> 
          </div>
        </nav>
       </section>
    <!-- akhir Navbar -->


<!-- konten -->
<section id="">
 <div class="text-center" style="height:100px;">
    <!-- Large modal -->
<section id="tambah">
<button type="button" class="btn btn-primary btn-lg text-center" data-toggle="modal" data-target=".bs-example-modal-lg" style="width: 400px;">Tambah Artikel</button>
</section>
 </div>

 
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
         <div class="formart form-horizontal" style="padding: 30px;">

           <form action="" method="POST">
             <label for="judul"> Judul :</label><br>
             <input type="text" name="judul" id="judul">
             <textarea name="artikel" id="artikel" placeholder="Tulis disini....." cols="116" rows="200"    style="margin-top: 20px; height: 400px;opacity: .8;"></textarea>
             <button type="submit" class="btn-primary btn-sm" name="tambah" style="margin-top: 20px;"> Tambah Artikel  </button>
           </form>
         </div>
        </div>
     </div>
    </div> 



 <div class="col-sm-10 col-sm-offset-1" style="height: 1000px; margin-top: 60px; color: white; 
    font-family: 'luckiest_guyregular'; font-size: 15px; ">
  

    <?php $i = 1 ?>
    <?php foreach ($iniartikel as $row): ?>
      <div class="mainartikel col-sm-12 " style=";padding-top: 5px; padding-bottom:5px; padding: 10px;margin-top: 100px;border: 2px solid white; ">
      <b> <div class="kon" style="width: 200px; height: 30px; background-color: red; margin: auto; position: absolute; top: -15px; border: 2px solid white"><p style="margin-bottom: -20px;" class="text-center"><?=  $row["judul"]; ?></p></b><br></div>
      <p style="font-family: 'arial'; margin-top: 30px;"><?= $row["artikel"]; ?></p><br>

       <a href="hapus.php?id=<?= $row["id"] ?>" onclick="return confirm('Yakin ingin menghapus??')" style="color: white;">
                      <button class="btn-sm" type="submit" name="hapus" id="hapus"  style="background-color: red;"><b>Hapus Artikel</b></button>
                    </a>
                    <a href="ubah.php?id= <?= $row["id"];?>">
                    <button class="btn-sm" type="submit" name="ubah" id="ubah"  style="background-color: skyblue; color:black"><b>Ubah Artikel</b></button>
                    </a><br>
                    </div>
    <?php $i++ ?>
    <?php endforeach; ?>
  


  

   
 </div> 
</section>
<!-- akhir konten -->















    

   






























        






    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

    <script src="js/script.js"></script>

    
  </body>
</html> 