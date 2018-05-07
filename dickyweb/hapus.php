<?php 
require 'functions.php';

// hapus
$ID = $_GET["id"];

if(hapus($ID) > 0 ) {
  echo "
    <script>
      alert('Data Berhasil Dihapus');
      document.location.href = 'index.php';
    </script>
      ";
} else {
  echo "
    <script>
      alert('Data Gagal Dihapus');
      document.location.href = 'index.php';
    </script>
      ";
}

?>