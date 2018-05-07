<?php
//koneksi ke databese
$conn = mysqli_connect("localhost", "root", "", "dicky");

function query($query){
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while($row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}



function registrasi ($data) {
	global $conn;
	global $query;
	global $result;

	$username = strtolower(stripslashes($data["username"]));
	$namalengkap = strtolower(stripslashes($data["namalengkap"]));
	$email = strtolower(stripslashes($data["email"]));
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);


	//cek username udah ada / belum
	$result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
	if(mysqli_fetch_assoc($result)){
		echo "<script>
		alert('Username Sudah Terdaftar')
		</script>";
		return false;
	}




	//cek konfirmasi pass
	if($password !== $password2){
		echo "<script>
				alert('konfirmasi password tidak sesuai')
			  </script>";
			  return false;
	}

	//endkripsi pass

	$password = password_hash($password, PASSWORD_DEFAULT);




	//tambahkan ke database
	mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$namalengkap',  '$email', '$password', 'password2')");

	return mysqli_affected_rows($conn);


}

function tambah($data) {
	global $conn;
	global $query;

	$judul = htmlspecialchars($data["judul"]);
	$artikel = htmlspecialchars($data["artikel"]);
	// query insert data
	$query = "INSERT INTO artikel
		VALUES ('', '$judul', '$artikel')";

		mysqli_query($conn, $query);
		return mysqli_affected_rows($conn);

}


function hapus($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM artikel WHERE id = $id");
	return mysqli_affected_rows($conn);
}


function ubah($data){
	global $conn;
	global $query;

	$id  = $data["id"];
	$judul = htmlspecialchars($data["judul"]);
	$artikel = htmlspecialchars($data["artikel"]);
	// query insert data
	$query = "UPDATE artikel SET 
				judul = '$judul',
				artikel = '$artikel' 
				WHERE id = $id
				";

		mysqli_query($conn, $query);
		return mysqli_affected_rows($conn);

}

function kirim($data) {
	global $conn;
	global $query;

	$nama = htmlspecialchars($data["nama"]);
	$email = htmlspecialchars($data["email"]);
	$telp = htmlspecialchars($data["telp"]);
	$pesan = htmlspecialchars($data["pesan"]);

	// query insert data
	$query = "INSERT INTO kontak
		VALUES ('', '$nama', '$email', '$telp', '$pesan')";

		mysqli_query($conn, $query);
		return mysqli_affected_rows($conn);

}



?>